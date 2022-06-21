<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use TCG\Voyager\Models\Role;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'users';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->where('role_id', Role::whereName('artist')->first()->id);
        });
    }

    /**
     * A user (artist) has many followers (viewers)
     * Returns viewers for the artist user
     * @return BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(
            Viewer::class,
            'artist_followers',
            'artist_id',
            'user_id',
            'id',
            'id'
        );
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return ($this->avatar == 'users/default.png') ?
            asset('images/users/default.png') : $this->avatar;
    }
}
