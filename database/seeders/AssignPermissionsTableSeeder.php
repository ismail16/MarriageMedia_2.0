<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use App\Models\Admin\RolePermission;
use Illuminate\Database\Seeder;

class AssignPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::all();

        RolePermission::where('id', '>', '0')->delete();
        if (count($permission) > 0) {
            for ($i = 0; $i < count($permission); $i++) {
                RolePermission::insertOrIgnore(
                    [
                        'permission_id' => $permission[$i]->id,
                        'role_id' => 1,
                        'created_by' => 1,
                    ]
                );
            }
        }
    }
}
