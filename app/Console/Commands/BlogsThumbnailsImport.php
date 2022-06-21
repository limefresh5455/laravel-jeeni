<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Jobs\UploadBlogThumbnail;
use App\Models\Post;

class BlogsThumbnailsImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogs:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->printMessage('****** Thumbnail Import Started ******','error');
        $postList= Post::get();
        if($postList->count() > 0) {
            foreach ($postList as $post) {
                dispatch(new UploadBlogThumbnail($post)) ->onQueue('default')
                    ->delay(Carbon::now()->addMinutes(2));
                $this->printMessage('Job created for Blog ID : '.$post->id);
            }
        } else {
            $this->printMessage('$ BLOGS NOT FOUND $', 'error');
        }
        $this->printMessage('****** Thumbnail Import Finished ******','error');

    }

    /**
     * @param $message
     * @param string $type
     */
    public function printMessage($message, string $type = 'line') {
        $this->{$type}($message);
    }
}
