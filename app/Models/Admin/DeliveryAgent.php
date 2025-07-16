<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryAgent extends Model
{
    use HasFactory;

    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'avatar',
        'dob',
        'blood_group',
        'commission',
        'email_address',
        'pin_code',
        'status',
        'availability_status',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'zip_code',
        'in_active',
        'vehicle_name',
        'owner_name',
        'vehicle_color',
        'vehicle_registration_no',
        'vehicle_details',
        'driving_license_no',
        'vehicle_rc_book_no',
        'account_name',
        'account_number',
        'gpay_number',
        'bank_address',
        'sc_code',
        'branch_name'
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('agents.first_name', 'like', '%' . $parameter . '%')
            ->orWhere('delivery_agents.last_name', 'like', '%' . $parameter . '%')
            ->OrWhere('delivery_agents.phone_number', $parameter)
            ->OrWhere('delivery_agents.status', $parameter)
            ->OrWhere('delivery_agents.availability_status', $parameter);
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country_id', 'id');
    }
    public function state()
    {
        return $this->belongsTo('App\Models\Admin\State', 'state_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Admin\City', 'city_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Web\Order');
    }
}
