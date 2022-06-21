<?php


namespace App\Helpers;

use App\Models\Social\SocialAccount;
use Illuminate\Support\Facades\Session;

/**
 * SocialDataHelper
 */
class SocialDataHelper {
    /**
     * @param $key
     * @return string
     */
    public static function getSocialData($key): string
    {
        $socialData = Session::get('social_login', []);
        return (array_key_exists($key, $socialData)) ? $socialData[$key] : '';
    }

    /**
     * @param $userId
     */
    public static function attachSocialAccount($userId) {
        SocialAccount::where('id', self::getSocialAccountId())
            ->update(['user_id' => $userId]);
        Session::forget('social_login');
    }

    /**
     * @return mixed
     */
    public static function getSocialAccountId() {
        $socialData = Session::get('social_login', []);
        return $socialData['account']->id;
    }
}
