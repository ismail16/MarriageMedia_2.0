<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\DeliveryAgent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
// use App\Models\Admin\Warehouse as AdminWarehouse;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'aid',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'gender',
        'marital_status',
        'profession',
        'country',
        'district',
        'birthday',
        'religion',
        'social_order',
        'looking_for',
        'address',
        'agreement',
        'password',
        'role_id',
        'status',
        'createdby',
        'updatedby'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('first_name', 'like', '%' . $parameter . '%')->orWhere('last_name', 'like', '%' . $parameter . '%')->orWhere('email', 'like', '%' . $parameter . '%')->orWhere('id', 'like', '%' . $parameter . '%');
    }


    public function role()
    {
        return $this->belongsTo('App\Models\Admin\Role', 'role_id', 'id');
    }

    public function deliveryAgent()
    {
        return $this->hasOne(DeliveryAgent::class);
    }
}
