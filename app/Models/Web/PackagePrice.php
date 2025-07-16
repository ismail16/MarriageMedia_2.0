<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
