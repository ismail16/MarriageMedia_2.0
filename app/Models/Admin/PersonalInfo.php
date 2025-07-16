<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
