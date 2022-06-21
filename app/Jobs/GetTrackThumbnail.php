<?php

namespace App\Jobs;

use App\Helpers\StorageHelper;
use App\Helpers\ThumbnailHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class GetTrackThumbnail implements ShouldQueue
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
        if (!is_null($track->track_file)){
            $storage = StorageHelper::getStorage();
            $storageFileName = ThumbnailHelper::getStorageFileName($track->id);
            try {
                ThumbnailHelper::fetchAndSubmitThumbnail($track, $storageFileName);
            } catch (\Exception $e) {
                printf('  '.$e->getMessage());
                if (!str_contains($e->getMessage(), 'File already exists at path')){
                    printf('*****'.$track->id.'******');
                }
            } finally {
                $track->thumbnail = $storage->url($storageFileName);
                $track->save(); // Update the db
            }
        }
    }
}
