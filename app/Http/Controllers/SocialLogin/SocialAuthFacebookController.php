<?php

namespace App\Http\Controllers\SocialLogin;

use App\Models\User;
use App\Services\SocialFacebookAccountService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthFacebookController extends Controller
{

    protected $fields = ['first_name', 'last_name', 'email'];
    public function fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        Session::put('url.intended', \URL::previous());
        try{
            $e = Socialite::driver('facebook')->asPopup()->redirect();
        }catch(\Exception $e){
            return redirect()->route('register');
        }

        return $e;
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $url = route('popup-close');

        try{
            $user = $service->createOrGetUser(Socialite::driver('facebook')->fields(['first_name', 'last_name', 'email'])->stateless()->user());
//            auth()->login($user);
            if(isset($user->user_id)){
                $user = User::where('id', $user->user_id)->first();
                auth()->login($user);
                return redirect($url);
//                return redirect()->route('dashboard');
            }else{
                $userInSystem = User::where('email', $user['email'])->withinProject()->count();
                $user['showMessages'] = false;
                if($userInSystem > 0){
                    $user['showMessages'] = true;
                }
                Session::put('social_login', $user);
                return redirect($url);
//                return redirect()->route('register');
            }
        }catch(\Exception $e){
            return redirect($url);
//            return redirect()->route('register');
        }
    }
}
