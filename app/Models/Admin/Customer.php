<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    use SoftDeletes;

    protected $fillable = [
        'c_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'gallery_id',
        'is_seen',
        'status',
        'hash',
        'password',
        'created_by',
        'updated_by',
        'provider',
        'provider_id',
        'google_id',
        'facebook_id',
        'avatar'
    ];

    protected $hidden = [
        'password',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('first_name', 'like', '%' . $parameter . '%')->orWhere('last_name', 'like', '%' . $parameter . '%')->orWhere('email', 'like', '%' . $parameter . '%');
    }

    public function scopeCustomerId($query, $id)
    {
        return $query->where('id', $id);
    }


    public function scopeHash($query, $hash)
    {
        return $query->where('hash', $hash);
    }

    public function gallery()
    {
        return $this->belongsTo('App\Models\Admin\Gallery', 'gallery_id', 'id');
    }

    public function customer_address_book()
    {
        return $this->hasMany('App\Models\Web\CustomerAddressBook');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Web\Order');
    }
}
