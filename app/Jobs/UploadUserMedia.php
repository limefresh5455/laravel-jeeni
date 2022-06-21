<?php

namespace App\Jobs;

use App\Helpers\StorageHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use mysql_xdevapi\Exception;

class UploadUserMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $storage = StorageHelper::getStorage();

        /*Uploading avatar*/
        if($user->avatar != 'users/default.png') {
            $fileName = 'avatar.'.StorageHelper::getFileExtension($user->avatar);
            $storageFileName = StorageHelper::getStorageFileName('user', $user->id, $fileName);
            $storage->put($storageFileName, file_get_contents($user->avatar), 'public');

            $user->avatar = $storage->url($storageFileName);
            $user->save();
        }

        /*Uploading CoverPhoto */
        if(!is_null($user->cover_photo)) {
            $fileName = 'cover_photo.'.StorageHelper::getFileExtension($user->cover_photo);
            $storageFileName = StorageHelper::getStorageFileName('user', $user->id, $fileName);
            $storage->put($storageFileName, file_get_contents($user->cover_photo), 'public');

            $user->cover_photo = $storage->url($storageFileName);
            $user->save();
        }

        # Previously used compact error handling
//        try {
//            if (($user->avatar != 'users/default.png') && ($user->avatar != 'users/January2022/vm2MNAocueV3R1e8YrMS.jpg')) {
//                $fileName = 'avatar.' . StorageHelper::getFileExtension($user->avatar);
//                $storageFileName = StorageHelper::getStorageFileName('user', $user->id, $fileName);
//                $storage->put($storageFileName, file_get_contents($user->avatar), 'public');
//                $user->avatar = $storage->url($storageFileName);
//                $user->save();
//            }
//        } catch(Exception $e) {
//            $storage->put($storageFileName, file_get_contents(StorageHelper::trimAvatarSizeFileName($user->avatar)), 'public');
//            $user->avatar = $storage->url($storageFileName);
//            $user->save();
//        }

    }
}
