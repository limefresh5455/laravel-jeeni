<?php

namespace App\Console\Commands;

use App\Jobs\GetTrackThumbnail;
use App\Models\Track;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 *
 */
class CheckThumbnails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:thumbnail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to check if thumbnails are generated correctly.';

    public $missingTracks = array();

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
    public function handle(): int
    {
        $this->printMessage('*** Tracks validation started ***','error');
        $tracks = Track::latest()->get();
        if($tracks->count() > 0) {
            foreach ($tracks as $track) {
                if(!$this->isUrlWorking($track->track_file)) {
                    $track->update([
                        'is_valid_track' => false
                    ]);
                    $this->printMessage('Track ['.$track->id.'] updated successfully.');
                }
            }
        } else {
            $this->printMessage('$ TRACKS NOT FOUND $', 'error');
        }
        $this->printMessage('*** Track file validation finished ***','error');


        $this->printMessage('*** Tracks thumbnail generation started ***','error');
        $tracks = Track::latest()->get();
        foreach ($tracks as $track) {
            if (!str_contains($track->thumbnail,"jeeni-default-img")
                && !$this->isUrlWorking($track->thumbnail)
                && $track->is_valid_track == true) {

                dispatch(new GetTrackThumbnail($track)) ->onQueue('default')
                    ->delay(Carbon::now()->addSeconds(30));

                $this->printMessage('Processed for TrackId : '.$track->id);
            } else {
                $this->printMessage('TrackId : '.$track->id.' is good to go!', 'error');
            }
        }

        $this->printMessage(PHP_EOL.'*** Tracks thumbnail generation finished ***','error');
        return 0;
    }

    /**
     * @param $message
     * @param string $type
     */
    public function printMessage($message, string $type = 'line') {
        $this->{$type}($message);
    }

    /**
     * @param $url
     * @return bool
     */
    function isUrlWorking($url): bool
    {
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_NOBODY, true);
        curl_exec($handle);

        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);

        if ($httpCode >= 200 && $httpCode < 300) {
            return true;
        }
        else {
            return false;
        }
    }
}
