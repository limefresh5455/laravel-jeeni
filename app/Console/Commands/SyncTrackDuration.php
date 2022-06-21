<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Jobs\GenerateTrackDuration;
use App\Models\Track;
use App\Helpers\ProgressHelper;

class SyncTrackDuration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track:duration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching video duration for available tracks';

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
     * @return void
     */
    public function handle()
    {
        $this->printMessage('*** Tracks duration synchronisation started ***','error');


        # Set-up progress tracker
        $start_time = microtime(true);
        $id_stack = array();


        $trackList = Track::whereNotNull('track_file')->get();
        if($trackList->count() > 0) {
            $trackListCount = $trackList->count();
            $trackListCounter = 0;
            foreach ($trackList as $track) {
                if (!is_null($track->track_file)){
                    try {
                        print(' Job created for TrackId : '.$track->id);
                        dispatch(new GenerateTrackDuration($track))->onQueue('default')
                            ->delay(Carbon::now()->addMinutes(2));
                    } catch (\Exception $e) {
                        $this->printMessage(" Erorr! Track id: ".$track->id . " - " . $e->getMessage(),'error');
                        array_push($id_stack, $track->id);
                    }
                }

                # Process progress tracker
                $trackListCounter++;
                print(PHP_EOL . round((100 * $trackListCounter / $trackListCount),2)."% " );
                $end_time = microtime(true);
                $execution_time = ($end_time - $start_time);
                print('Time Elapsed: ' . gmdate("H:i:s",$execution_time));
            }

        } else {
            $this->printMessage('$ TRACKS NOT FOUND $', 'error');
        }

        # Finish progress trracker
        $end_time = microtime(true);
        $execution_time = ($end_time - $start_time);
        $this->printMessage('Time Elapsed: ' . gmdate("H:i:s",$execution_time));


        $this->printMessage(PHP_EOL.'*** Tracks duration synchronisation finished ***','error');
    }

    /**
     * @param $message
     * @param string $type
     */
    public function printMessage($message, string $type = 'line') {
        $this->{$type}($message);
    }
}
