<?php
/**
 * Created by PhpStorm.
 * User: Mike Nahlik
 * Date: 05/04/2022
 * Time: 10:01 AM
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
class ThumbnailHelper
{
    /*
     * Create a string according to the S3 bucket directory structure to store the thumbnail
     * @param $id
     * @return string
     */
    public static function getStorageFileName($id): string
    {
        return 'track/'.$id.'/'.$id.'_thumbnail.png';
    }

    /*
     * Fetches the track from URL, extracts a frame from 10 seconds within the video and submits it into the S3 bucket
     * @param $track
     * @param $storageFileName
     * @return void
     */
    public static function fetchAndSubmitThumbnail($track, $storageFileName){
        FFMPEG::openURL($track->track_file)
            ->getFrameFromSeconds(10)
            ->export()
            ->toDisk('s3_jeeni')
            ->save($storageFileName);
    }

    /*
     * Uses the track video to get the duration in seconds
     * @param $track
     * @return int
     */
    public static function getVideoDuration($track, $storageFileName){

        /*# Duration
        $image = file_get_contents("https://jeeni-22.s3.eu-west-2.amazonaws.com/test2/test3.png");
        $duration = FFMpeg\FFProbe::create()
            ->format(file_get_contents($track->track_file))
            ->get('duration');

        echo $duration;*/
    }

    /**
     * @param $moduleType
     * @param $objectId
     * @param $fileName
     * @return string
     */
    public static function getThumbnailStorageFileName ($moduleType, $objectId, $fileName): string
    {
        $thumbnailFileName = substr_replace($fileName,'_thumbnail.jpg',-4);
        return $moduleType.'/'.$objectId.'/'.$thumbnailFileName;
    }
    /**
     * @param $slug
     * @return string
     */
    public static function getThumbnailURL ($slug): string
    {
        return "https://jeeni.com/wp-content/uploads/" . $slug;
    }
    /**
     * @param $slug
     * @return string
     */
    public static function setDefaultThumbnailName ($slug): string
    {
        if ($slug == 0) {
            return "2022/03/jeeni-default-img.jpg";
        } else {
            return $slug;
        }
    }
    /**
     * @param $slug
     * @return string
     */
    public static function trimAvatarSizeFileName ($slug): string
    {
        return substr($slug,0,-12) . substr($slug,-4);
    }

}
