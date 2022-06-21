<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    /**
     * Return related tracks.
     */
    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class, 'track_channels', 'channel_id', 'track_id');
    }
}
