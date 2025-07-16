<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'division_id',
        'name',
        'bn_name',
        'url'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
