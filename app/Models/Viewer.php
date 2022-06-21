<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Viewer extends Model
{
    use HasFactory;

    protected $table = 'users';

    /**
     * A user (viewer) follows many artist
     * Returns artist followed by the viewer
     * @return BelongsToMany
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(
            Artist::class,
            'artist_followers',
            'user_id',
            'artist_id',
            'id',
            'id'
        );
    }
}
