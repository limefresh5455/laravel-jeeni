<?php

namespace App\Console\Commands;

use App\Jobs\UploadTrackMedia;
use App\Jobs\UploadUserMedia;
use App\Models\Track;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 *
 */
class AssetMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jeeni-asset:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to migrate assets form wordpress to AWS S3';

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
     * @return void
     */
    public function handle()
    {
        $this->printMessage('Assets Migration started.');
        $start_time = microtime(true);
        /*Starting with User Data*/
        $this->printMessage('************** Migrating Users data *************','error');
        // $userList = User::where('avatar','!=','users/default.png')
        //     ->orWhereNotNull('cover_photo')->get();
        // if($userList->count() > 0) {
        //     foreach ($userList as $user) {
        //         dispatch(new UploadUserMedia($user)) ->onQueue('default')
        //             ->delay(Carbon::now()->addMinutes(2));
        //         $this->printMessage('Job created for UserId : '.$user->id);
        //     }
        // } else {
        //     $this->printMessage('$ USERS NOT FOUND $', 'error');
        // }

//         $userList = User::where('avatar','!=','users/default.png')
//             ->orWhereNotNull('cover_photo')->get();
//         if($userList->count() > 0) {
//             foreach ($userList as $user) {
//                 dispatch(new UploadUserMedia($user)) ->onQueue('default')
//                     ->delay(Carbon::now()->addMinutes(2));
//                 $this->printMessage('Job created for UserId : '.$user->id);
//             }
//         } else {
//             $this->printMessage('$ USERS NOT FOUND $', 'error');
//         }

        $this->printMessage('************** Users migration finished *************','error');

        $end_time = microtime(true);
        $execution_time = ($end_time - $start_time);
        $this->printMessage('Time Elapsed: ' . gmdate("H:i:s",$execution_time));

        $this->printMessage('************** Tracks migration started *************','error');
        $trackList = Track::whereNotNull('track_file')->get();
        if($trackList->count() > 0) {
            foreach ($trackList as $track) {
                try {
                    dispatch(new UploadTrackMedia($track))->onQueue('default')
                        ->delay(Carbon::now()->addMinutes(2));
                    $this->printMessage('Job created for TrackId : ' . $track->id);
                } catch (\Exception $e) {
                    $this->printMessage("Erorr! Track id: ".$track->id,'error');
                }
            }
        } else {
            $this->printMessage('$ USERS NOT FOUND $', 'error');
        }
        $this->printMessage('************** Tracks migration finished *************','error');

        $end_time = microtime(true);
        $execution_time = ($end_time - $start_time);
        $this->printMessage('Time Elapsed: ' . gmdate("H:i:s",$execution_time));
        $this->printMessage('Assets Migration finished.');
    }

    /**
     * @param $message
     * @param string $type
     */
    public function printMessage($message, string $type = 'line') {
        $this->{$type}($message);
    }
}
