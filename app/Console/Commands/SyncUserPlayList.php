<?php

namespace App\Console\Commands;

use App\Helpers\Jeeni;
use App\Models\Track;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncUserPlayList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:playlist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating playlist for user if not exist';

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
        $userList = User::all();
        if($userList->count())
        {
            foreach ($userList as $user) {
                if($user->playlists()->count() == 0) {
                    Jeeni::createUserPlaylist($user);
                    $this->printMessage('Playlist created for UserId: '.$user->id);
                }
            }
        }

        Track::where('id', '>', 0)->update([
            'is_active' => true
        ]);
    }

    /**
     * @param $message
     * @param string $type
     */
    public function printMessage($message, string $type = 'line') {
        $this->{$type}($message);
    }
}
