<?php

namespace App\Http\Controllers\SocialLogin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialGoogleAccountService;

class SocialAuthGoogleController extends Controller
{
    /**
     * Create a redirect method to google api.
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse|void
     */
    public function redirect_google(){
        Session::put('url.intended', URL::previous());
        try{
            return Socialite::driver('google')->redirect();
        }catch(\Exception $e){
            dd($e->getMessage(), 'redirect()');
        }
    }

    /**
     * Return a callback method from Google api.
     *
     * @param SocialGoogleAccountService $service
     * @return RedirectResponse
     */
    public function callback_google(SocialGoogleAccountService $service): RedirectResponse
    {
        $url = route('subscribe');
        try{
            $user = $service->createOrGetUser(Socialite::driver('google')->stateless()->user());
            if(isset($user->user_id)){
                $loginUser = User::where('id', $user->user_id)->first();
                auth()->login($loginUser);
                return redirect()->route('welcome');
            } else {
                $userInSystem = User::where('email', $user['email'])->count();
                if($userInSystem > 0){
                    return redirect()->route('login')
                        ->with('error', 'User already exists with email address!!');
                } else {
                    Session::put('social_login', $user);
                    return redirect($url);
                }
            }
        } catch(\Exception $e) {
            return redirect()->route('login')
                ->with('error', $e->getMessage());
        }
    }
}
