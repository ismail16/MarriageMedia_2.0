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

    public function user_info()
    {
        return $this->hasOne('App\Models\Admin\PersonalInfo');
    }

    public function preference()
    {
        return $this->hasOne('App\Models\Admin\Preference');
    }

    public function profileImages()
    {
        return $this->hasMany(UserProfileImage::class, 'user_id')->orderBy('created_at', 'desc');
    }

    public function affiliate_account()
    {
        return $this->hasOne('App\Models\AffiliateAccount');
    }

    public function referral_list()
    {
        return $this->hasMany('App\Models\ReferralList');
    }

    public function affiliate_payment()
    {
        return $this->hasMany('App\Models\AffiliatePayment');
    }


    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country');
    }
    public function division()
    {
        return $this->belongsTo('App\Models\Admin\Division');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\Admin\District');
    }
    public function upazila()
    {
        return $this->belongsTo('App\Models\Admin\Upazila');
    }
    public function union()
    {
        return $this->belongsTo('App\Models\Admin\Union');
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
