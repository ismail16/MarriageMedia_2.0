<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        Role::where('id', '>', '0')->delete();

        Role::insertOrIgnore([
            'name' => 'Super Admin',
        ]);

        Role::insertOrIgnore([
            'name' => 'Admin',
        ]);

        Role::insertOrIgnore([
            'name' => 'Data Entry',
        ]);
    }
}
