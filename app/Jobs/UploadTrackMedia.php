<?php

namespace App\Jobs;

use App\Helpers\StorageHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadTrackMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $track;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($track)
    {
        $this->track = $track;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $track = $this->track;
        $storage = StorageHelper::getStorage();

        /* Save track */
        $fileName = StorageHelper::getFileName($track->track_file);
        $storageFileName = StorageHelper::getStorageFileName('track', $track->id, $fileName);
        $storage->put($storageFileName, file_get_contents($track->track_file), 'public');
        $track->track_file = $storage->url($storageFileName);
        $track->save();

        /* Save Track thumbnail */
//        $track->thumbnail = ThumbnailHelper::setDefaultThumbnailName($track->thumbnail);
//        $thumbnailFileName = ThumbnailHelper::getFileName($track->thumbnail);
//        $thumbnailStorageFileName = ThumbnailHelper::getThumbnailStorageFileName('track', $track->id, $thumbnailFileName);
//        $thumbnailURL = ThumbnailHelper::getThumbnailURL($track->thumbnail);
//        $storage->put($thumbnailStorageFileName, file_get_contents($thumbnailURL), 'public');
//        $track->thumbnail = $storage->url($thumbnailStorageFileName);
//        $track->save();
    }
}
