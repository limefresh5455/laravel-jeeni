<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ForceResetPassword
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path() == 'login'
            && $request->method() == 'POST') {
            $isEmailExist = User::whereEmail($request->get('email'))->first();
            if($isEmailExist instanceof User
                && $isEmailExist->is_password_updated == false) {
                return redirect()->to(url('password/reset'))->with([
                    'information' => 'Welcome! The new Jeeni is here.<br/>Due to new security feature, you will have to update your password. Please enter the email address and the password reset link will be sent to you.'
                ]);
            }
        }
        return $next($request);
    }
}
