<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * UserFeedback
 */
class UserFeedback extends Model
{

    /**
     * @var string
     */
    protected $table = 'user_feedbacks';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'feedback'
    ];

    /**
     * Return associated User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
