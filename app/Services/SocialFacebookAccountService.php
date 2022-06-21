<?php
namespace App\Services;
use App\Models\Social\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

/**
 * SocialFacebookAccountService
 */
class SocialFacebookAccountService
{
    /**
     * @param ProviderUser $providerUser
     * @return array
     */
    public function createOrGetUser(ProviderUser $providerUser): array
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->where('user_id', '!=', 0)
            ->first();
        if ($account) {
            return $account;
        } else {
            $account = SocialAccount::create([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            return [
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'first_name' => $providerUser->user['first_name'],
                'last_name' => $providerUser->user['last_name'],
                'password' => $providerUser->getId(),
                'account' => $account
            ];
        }
    }
}
