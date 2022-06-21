<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Track;
use App\Jobs\GetTrackThumbnail;

class GenerateThumbnail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:thumbnail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replace all the default Jeeni default thumbnails with an random screenshot from the video';

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
        $start_time = microtime(true);
        $id_stack = array();
        $this->printMessage('*** Tracks thumbnail generation started ***','error');
        $trackList = Track::whereNotNull('track_file')->get();
        if($trackList->count() > 0) {
            $trackListCount = $trackList->count();
            $trackListCounter = 0;
            foreach ($trackList as $track) {
                if (str_contains($track->thumbnail,"jeeni-default-img") && !str_contains($track->track_file,'.mp3')){
                    
                    try {
                        print(' Job created for TrackId : '.$track->id);
                        dispatch(new GetTrackThumbnail($track)) ->onQueue('default')
                            ->delay(Carbon::now()->addMinutes(2));
                    } catch (\Exception $e) {
                        $this->printMessage(" Erorr! Track id: ".$track->id . " - " . $e->getMessage(),'error');
                        array_push($id_stack, $track->id);
                    }
                }

                $trackListCounter++;
                print(PHP_EOL . round((100 * $trackListCounter / $trackListCount),2)."% " );
                $end_time = microtime(true);
                $execution_time = ($end_time - $start_time);
                print('Time Elapsed: ' . gmdate("H:i:s",$execution_time));
            }

        } else {
            $this->printMessage('$ TRACKS NOT FOUND $', 'error');
        }
        $this->printMessage(PHP_EOL.'*** Tracks thumbnail generation finished ***','error');
        $end_time = microtime(true);
        $execution_time = ($end_time - $start_time);
        $this->printMessage('Time Elapsed: ' . gmdate("H:i:s",$execution_time));
        return 0;
    }

    /**
     * @param $message
     * @param string $type
     */
    public function printMessage($message, string $type = 'line') {
        $this->{$type}($message);
    }
}
