<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\DeliveryAgent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
// use App\Models\Admin\Warehouse as AdminWarehouse;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
        'created_by',
        'updated_by'
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


    // public function warehouses()
    // {
    //     return $this->belongsToMany(AdminWarehouse::class, 'user_warehouses');
    // }
    public function deliveryAgent()
    {
        return $this->hasOne(DeliveryAgent::class);
    }
}
