<?php

namespace App\Jobs;

use App\Helpers\StorageHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadBlogThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $post = $this->post;
            $storage = StorageHelper::getStorage();
            $postLocation = 'home/misiek/Jeeni/BlogsImages/' . $post->id . '/' . $post->id . '_thumbnail.png';
            $storageFileName = StorageHelper::getStorageFileName('post', $post->id, $post->id . "_thumbnail.png");
            $storage->put($storageFileName, file_get_contents($postLocation), 'public');
            $post->image = $storage->url($storageFileName);
            $post->save();
        } catch (\Exception $e) {
            print ("Error on Upload for:" . $post->id . ' Error:' . $e->getMessage());
        }
    }
}
