<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Channel;
use App\Models\Email;
use App\Models\EmailUser;
use App\Models\Invite;
use App\Models\Newsfeed;
use App\Models\Offer;
use App\Models\Playlist;
use App\Models\Showcase;
use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class JeeniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultRoles = config('jeeni.roles');
        foreach ($defaultRoles as $name => $displayName) {
            $role = Role::firstOrNew(['name' => $name]);
            if (!$role->exists) {
                $role->fill([
                    'display_name' => $displayName,
                ])->save();
            }
        }

        User::factory()->count(20)->create();
        Channel::factory()->count(20)->create();
        Invite::factory()->count(20)->create();
        Newsfeed::factory()->count(20)->create();
        Offer::factory()->count(20)->create();
        Playlist::factory()->count(20)->create();
        Showcase::factory()->count(20)->create();
        Track::factory()->count(20)->create();
        Campaign::factory()->count(20)->create();
        Email::factory()->count(20)->create();
        EmailUser::factory()->count(20)->create();
    }
}
