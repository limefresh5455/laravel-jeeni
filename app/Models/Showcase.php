<?php

namespace App\Models;

use App\Helpers\Jeeni;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Showcase extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'photo',
        'is_active'
    ];

    /**
     * Return associated User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string;
     */
    public function getThumbnail(): string
    {
        $thumb = $this->photo;
        if (!filter_var($thumb, FILTER_VALIDATE_URL)) {
            $thumb = Jeeni::getRandomThumbnail();
        }
        return $thumb;
    }
}
