<?php
/**
 * Created by PhpStorm.
 * User: Mike Nahlik
 * Date: 13/04/2022
 * Time: 17:50 AM
 */

namespace App\Helpers;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;

/**
 * StorageHelper Class
 */
class DurationHelper
{
    /**
     *
     * @param $trackFile
     * @return string
     */
    public static function getTrackDurationInSeconds ($trackFile): string
    {
        try {
            $media = FFMpeg::openURL($trackFile);
            $durationInSeconds = $media->getDurationInSeconds();

        } catch (\Exception $e) {
            $durationInSeconds = 198;
            print(" Error for track:" . $trackFile . " : ". $e->getMessage());
        } finally {
            return $durationInSeconds;
        }
    }
}
