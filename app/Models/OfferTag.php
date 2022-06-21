<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferTag extends Model
{
    use HasFactory;

    protected $fillable = ['offer_id', 'tag_id'];
}
