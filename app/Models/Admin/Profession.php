<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['name', 'slug', 'status'];
}
