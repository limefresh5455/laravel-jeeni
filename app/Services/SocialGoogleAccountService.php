<?php
namespace App\Services;
use App\Models\Social\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

/**
 * SocialGoogleAccountService
 */
class SocialGoogleAccountService
{
    /**
     * @param ProviderUser $providerUser
     * @return mixed
     */
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->where('user_id', '!=', 0)
            ->first();
        if ($account) {
            return $account                                                         ;
        } else {
            $account = SocialAccount::create([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);

            return [
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'first_name' => $providerUser->user['given_name'],
                'last_name' => $providerUser->user['family_name'],
                'password' => $providerUser->getId(),
                'account' => $account
            ];
        }
    }
}
