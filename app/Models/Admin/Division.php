<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name',
        'bn_name',
        'url'
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
