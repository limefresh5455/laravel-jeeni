<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Jobs\SendInviteEmail;
use App\Models\Invite;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InviteController extends Controller
{
    /**
     * Show the Invite Page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('front.my-invites');
    }

    /**
     * Send invites to others
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendInvites(Request $request): RedirectResponse
    {

        foreach (explode(',', $request->email) as $email) {
            if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {

                Session::flash('errorMessage', 'You have entered an invalid email address.');
                return redirect()
                    ->back()
                    ->withInput();
            }
        }

        $emails = explode(',', $request->email);

        foreach ($emails as $email) {
            $email = trim($email);

            SendInviteEmail::dispatch($email, Auth::user()->name);

            Invite::create([
                'user_id' => Auth::id(),
                'email' => trim($email)
            ]);
        }

        return redirect()->back();
    }
}
