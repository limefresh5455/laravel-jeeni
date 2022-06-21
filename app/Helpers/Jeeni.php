<?php
/**
 * Created by PhpStorm.
 * User: Jiten Patel
 * Date: 10/30/2018
 * Time: 6:16 PM
 */

namespace App\Helpers;

use App\Models\Channel;
use App\Models\Email;
use App\Models\Playlist;
use App\Models\Showcase;
use App\Models\Track;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\Role;

/**
 *
 */
class Jeeni
{
    /**
     * @return array
     */
    public static function availableRoles(): array
    {
        return self::formattedLovOptions(Role::orderBy('name')->pluck('display_name', 'id')->toArray());
    }

    /**
     * @return array
     */
    public static function availableUsers(): array
    {
        return self::formattedLovOptions(User::orderBy('name')->pluck('name', 'id')->toArray());
    }

    /**
     * @return array
     */
    public static function availableShowcases(): array
    {
        return self::formattedLovOptions(Showcase::orderBy('title')->pluck('title', 'id')->toArray());
    }

    /**
     * @param string $order
     * @return array
     */
    public static function availableChannels(string $order = 'name'): array
    {
        $channels = Channel::whereIsActive(true)
            ->orderBy($order)
            ->pluck('name', 'id')->toArray();
        $myChannel = array_search('ALL CHANNELS', $channels);
        $channels = [$myChannel => 'ALL CHANNELS'] + $channels;
        return self::formattedLovOptions($channels);
    }

    /**
     * @return array
     */
    public static function availableEmailTemplates(): array
    {
        return self::formattedLovOptions(
            Email::where('Is_final', true)
                ->orderBy('name')->pluck('name', 'id')->toArray()
        );
    }

    /**
     * @param $input
     * @param string $format
     * @return Carbon|CarbonInterface|false
     */
    public static function getFormattedDateToInsert($input, string $format = '') {
        if($format == '') {
            $format = config('jeeni.php-date-format');
        }
        return Carbon::createFromFormat($format, $input);
    }

    /**
     * @param $input
     * @return string
     */
    public static function getFormattedDateToDisplay($input): string
    {
        return Carbon::parse($input)->format(config('jeeni.php-date-format'));
    }

    /**
     * @return array
     */
    public static function availableStatuses(): array
    {
        return self::formattedLovOptions(config('jeeni.status'));
    }

    /**
     * @return array
     */
    public static function availableIsFinal(): array
    {
        return self::formattedLovOptions(config('jeeni.is_final'));
    }

    /**
     * @return array
     */
    public static function availableEmailStatus(): array
    {
        return self::formattedLovOptions(config('jeeni.email_status'));
    }

    /**
     * @param string $filename
     * @param string $delimiter
     * @return array|bool
     */
    public static function csvToArray(string $filename = '', string $delimiter = ',') {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }

    /**
     * @param $path
     * @return string
     */
    public static function getJeeniImage($path): string
    {
        if($path != '' && !filter_var($path, FILTER_VALIDATE_URL)) {
            return '<img src="'.Voyager::image($path).'" style="width:100px">';
        } elseif (filter_var($path, FILTER_VALIDATE_URL)) {
            return '<img src="'.$path.'" style="width:100px">';
        } else {
            return $path;
        }
    }

    /**
     * @return int
     */
    public static function getCurrentMonth(): int
    {
        return Carbon::now()->month;
    }

    /**
     * @param $number
     * @return float
     */
    public static function precisionRounding($number): float
    {
        return round($number, 2);
    }

    /**
     * @param $options
     * @return array
     */
    public static function formattedLovOptions($options): array
    {
        $response = [];
        foreach ($options as $id => $name) {
            array_push($response, [
                'id' => $id,
                'name' => str_replace('\'','', $name)
            ]);
        }
        return $response;
    }

    /**
     * @param $employeeData
     * @return array
     */
    public static function sanitizeData($employeeData): array
    {
        $returnData = [];
        foreach ($employeeData as $key => $value) {
            $returnData[$key] = trim($value);
        }
        return $returnData;
    }

    /**
     * @param string $type
     * @return mixed
     */
    public static function getRoleIdByType(string $type = 'admin') {
        $role = Role::whereName($type)->first();
        if(!($role instanceof Role)) {
            $role = Role::create([
                'name' => $type,
                'display_name' => ucwords($type)
            ]);
        }
        return $role->id;
    }

    /**
     * @param string $type
     * @return Repository|Application|mixed
     */
    public static function getSocialMedialLink(string $type = 'facebook') {
        return config('jeeni.social_medial.' . $type, '#');
    }

    /**
     * @param string $name
     * @return false
     */
    public static function hasRole(string $name = 'admin'): bool
    {
        return (Auth::check()) ? Auth::user()->hasRole($name) : false;
    }

    /**
     * @return string
     */
    public static function getSupportEmailAddress(): string
    {
        return Voyager::setting('admin.support_email_address',
            config('jeeni.support_email_address', 'info@jeeni.com'));
    }

    /**
     * @return array
     */
    public static function getDefaultPlan(): array
    {
        return config('jeeni.stripe_plan', []);
    }

    /**
     * @return mixed
     */
    public static function getLatestVideos() {
        return Track::where('is_active', true)
            ->groupBy('user_id')
            ->orderBy('id', 'desc')->limit(20)->get();
    }

    /**
     * @return string
     */
    public static function getRandomThumbnail(): string
    {
        return asset('front/images/slider-'.rand(1,5).'.jpg');
    }

    /**
     * @param User $user
     */
    public static function createUserPlaylist(User $user)
    {
        Playlist::firstOrCreate([
            'user_id' => $user->id,
            'name' => 'My Playlist',
            'is_active' => true
        ]);
    }

    /**
     * @param bool $arrayToggle
     */
    public static function getInsideStoryVideos(bool $arrayToggle = true)
    {
        if($arrayToggle) {
            $returnList = [];
            $insideStoryVideos = Channel::whereName('Inside Story Interviews')
                ->first()->tracks()->whereIsActive(true)->limit(25)->get();
            foreach ($insideStoryVideos as $key => $insideStoryVideo) {
                $temp[] = $insideStoryVideo;
                if(($key+1) % 5 == 0) {
                    $returnList[] = $temp;
                    $temp = [];
                }
            }
            return $returnList;
        } else {
            return Channel::whereName('Inside Story Interviews')
                ->first()->tracks()->whereIsActive(true)->limit(25)->get();
        }
    }

    /**
     * @return array
     */
    public static function getPermissionTree(): array
    {
        $menu = Menu::where('name', 'admin')->first();
        $parentItems = $menu->parent_items->whereNotIn('title', ['Home', 'Logout'])->sortBy('order');

        $permissionTree = [];
        foreach ($parentItems as $parent) {
            $parentInfo = [
                'id' => $parent->id,
                'title' => $parent->title,
                'permission_keys' => self::getPermissionKeys($parent),
            ];

            $childItems = $parent->children()->orderBy('order')->get();
            $childList = [];
            foreach ($childItems as $child) {
                array_push($childList, [
                    'id' => $child->id,
                    'title' => $child->title,
                    'permission_keys' => self::getPermissionKeys($child),
                ]);
            }
            $parentInfo['children'] = $childList;
            array_push($permissionTree, $parentInfo);
        }
        return $permissionTree;
    }

    /**
     * @param $menuItem
     * @return array
     */
    public static function getPermissionKeys($menuItem): array
    {
        $permissionKeys = [];
        if (!is_null($menuItem->url) && $menuItem->url != '') {
            foreach (self::getAvailableActions() as $action) {
                $sectionName = self::getSectionName($action, $menuItem->url, 'url');
                array_push($permissionKeys, $sectionName);
                if (self::isSinglePermission($sectionName)) break;
            }
        } elseif (!is_null($menuItem->route) && $menuItem->route != '') {
            foreach (self::getAvailableActions() as $action) {
                $routeItems = explode('.', $menuItem->route);
                $sectionName = self::getSectionName($action, $routeItems[1], 'route');
                array_push($permissionKeys, $sectionName);
                if (self::isSinglePermission($sectionName)) break;
            }
        }
        return $permissionKeys;
    }

    /**
     * @return array
     */
    public static function getAvailableActions(): array
    {
        return config('jeeni.actions', []);
    }

    /**
     * @param $section
     * @return bool
     */
    public static function isSinglePermission($section): bool
    {
        $singleSections = config('jeeni.single_permission_sections');
        return in_array($section, $singleSections);
    }

    /**
     * @param $action
     * @param $typeValue
     * @param $type
     * @return string
     */
    public static function getSectionName($action, $typeValue, $type): string
    {
        if ($type == 'url') {
            return $action . '_' . str_replace('admin/', '',
                    str_replace('-', '_',
                        str_replace(' ', '_', $typeValue)));
        } else {
            return $action . '_' . str_replace(' ', '_',
                    str_replace('-', '_', $typeValue));
        }
    }

    /**
     * @param string $data
     * @return string
     */
    public static function encryptData(string $data): string
    {
        return Crypt::encryptString($data);
    }

    /**
     * @param string $data
     * @return string
     */
    public static function decryptData(string $data): string
    {
        return Crypt::decryptString($data);
    }
}

