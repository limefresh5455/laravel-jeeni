<?php
/**
 * Created by PhpStorm.
 * User: Jiten Patel
 * Date: 23/01/2022
 * Time: 4:16 PM
 */

namespace App\Helpers;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;

/**
 * StorageHelper Class
 */
class StorageHelper
{
    /**
     * DS based DIRECTORY SEPARATOR
     */
    const DS = DIRECTORY_SEPARATOR;

    /**
     * AWS-S3 storage key
     */
    const S3_DISK = 's3_jeeni';

    /**
     * Function to prepare path form parts
     * @param array $fileParts
     * @return string
     */
    public static function pathBuilder(array $fileParts): string
    {
        return implode(self::DS, $fileParts);
    }

    /**
     * Creating a folder if not exist in provided path
     * @param $folderPath
     * @return void
     */
    public static function createFolderIfNotExist($folderPath){
        if(!file_exists($folderPath)){
            mkdir($folderPath, 0755, true);
        }
    }

    /**
     * Function to get S3 Storage
     * @return FilesystemAdapter
     */
    public static function getStorage(): FilesystemAdapter
    {
        return Storage::disk(self::S3_DISK);
    }

    /**
     * @param $path
     * @return array|string|string[]
     */
    public static function getFileExtension($path) {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * @param $path
     * @return string
     */
    public static function getFileName($path): string
    {
        return basename($path);
    }

    /**
     * @param $moduleType
     * @param $objectId
     * @param $fileName
     * @return string
     */
    public static function getStorageFileName($moduleType, $objectId, $fileName): string
    {
        return $moduleType.'/'.$objectId.'/'.$fileName;
    }

}
