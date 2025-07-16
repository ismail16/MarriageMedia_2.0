<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        Admin::where('id', '>', '0')->delete();

        //Admin 1
        Admin::insertOrIgnore([
            'aid' => '1001',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'mobile' => '01700000001',
            'email' => 'superadmin@gmail.com',
            'gender' => 'male',
            'marital_status' => 'single',
            'profession' => 'Super Admin',
            'country' => 'Bangladesh',
            'birthday' => '10-11-1995',
            'createdby' => 'myself',
            'religion' => 'islam',
            'looking_for' => 'none',
            'password' => \Hash::make('11111111'),
            'agreement' => 1,
            'activation' => 1,
            'status' => 1,
            'role_id' => 1,
        ]);

        //Admin 2
        Admin::insertOrIgnore([
            'aid' => '1002',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'mobile' => '01700000002',
            'email' => 'admin@gmail.com',
            'gender' => 'male',
            'marital_status' => 'single',
            'profession' => 'Super Admin',
            'country' => 'Bangladesh',
            'birthday' => '10-11-1995',
            'createdby' => 'myself',
            'religion' => 'islam',
            'looking_for' => 'none',
            'password' => \Hash::make('11111111'),
            'agreement' => 1,
            'activation' => 1,
            'status' => 1,
            'role_id' => 2,
        ]);

        //Admin 3
        Admin::insertOrIgnore([
            'aid' => '1002',
            'first_name' => 'Data',
            'last_name' => 'Entry',
            'mobile' => '01700000003',
            'email' => 'dataentry@gmail.com',
            'gender' => 'male',
            'marital_status' => 'single',
            'profession' => 'Data entry',
            'country' => 'Bangladesh',
            'birthday' => '10-11-1995',
            'createdby' => 'myself',
            'religion' => 'islam',
            'looking_for' => 'none',
            'password' => \Hash::make('11111111'),
            'agreement' => 1,
            'activation' => 1,
            'status' => 1,
            'role_id' => 3,
        ]);
    }
}
