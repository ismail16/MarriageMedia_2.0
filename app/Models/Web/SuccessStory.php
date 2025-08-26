<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'bride_name',
        'groom_name',
        'location',
        'marriage_date',
        'comment',
        'status',
        'image'
    ];
}
