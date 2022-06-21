<?php
/**
 * Created by PhpStorm.
 * User: Jiten Patel
 * Date: 23/01/2022
 * Time: 4:16 PM
 */

namespace App\Helpers;

use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Setting;

/**
 * HomePageHelper Class
 */
class HomePageHelper
{

    /**
     * Homepage configuration keys
     */
    const homepage_configuration_keys = [
        'site.pick_of_the_day_video_link',
        'site.home_page_header_text',
        'site.pick_of_the_day_video_thumb',
        'site.pick_of_the_day_video_sub_title',
        'site.viewer_video_link',
        'site.viewer_video_thumb',
        'site.viewer_video_sub_title',
        'site.artist_video_link',
        'site.artist_video_thumb',
        'site.artist_video_sub_title',
        'site.invest_left_video_link',
        'site.invest_left_video_thumb',
        'site.invest_left_video_sub_title',
        'site.invest_right_video_link',
        'site.invest_right_video_thumb',
        'site.invest_right_video_sub_title'
    ];

    /**
     * @param string $key
     * @return mixed
     */
    public static function getConfigurationData(string $key = '') {
        if($key != '') {
            return Voyager::setting($key, '');
        } else {
            return Setting::whereIn('key', self::homepage_configuration_keys)
                ->pluck('value', 'key')->toArray();
        }
    }
}
