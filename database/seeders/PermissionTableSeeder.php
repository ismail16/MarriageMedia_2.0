<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::where('id', '>', '0')->delete();
        //1
        Permission::insertOrIgnore([
            'key' => 'Dashboard',
            'Value' => 'dashboard',
            'parent_id' => 0

        ]);

        //2
        Permission::insertOrIgnore([
            'key' => 'Roles Permission',
            'Value' => 'role-permission',
            'parent_id' => 0
        ]);

        //3
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-role-permission',
            'parent_id' => 2

        ]);

        //4
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-role-permission',
            'parent_id' => 2

        ]);
        //5
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-role-permission',
            'parent_id' => 2

        ]);
        //6
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-role-permission',
            'parent_id' => 2

        ]);

        //7
        Permission::insertOrIgnore([
            'key' => 'Users',
            'Value' => 'users',
            'parent_id' => 0
        ]);
        //8
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'admin-user',
            'parent_id' => 7

        ]);
        //9
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-admin-user',
            'parent_id' => 7

        ]);
        //10
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-admin-user',
            'parent_id' => 7

        ]);
        //11
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-admin-user',
            'parent_id' => 7
        ]);

        //12
        Permission::insertOrIgnore([
            'key' => 'Manage Gallery',
            'Value' => 'gallery',
            'parent_id' => 0
        ]);
        //13
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-gallery',
            'parent_id' => 12
        ]);
        //14
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-gallery',
            'parent_id' => 12
        ]);
        //15
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-gallery',
            'parent_id' => 12
        ]);
        //16
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-gallery',
            'parent_id' => 12
        ]);

        //17
        Permission::insertOrIgnore([
            'key' => 'Gallery Settings',
            'Value' => 'gallery-settings',
            'parent_id' => 0
        ]);
        //18
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-gallery-settings',
            'parent_id' => 17
        ]);
        //19
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-gallery-settings',
            'parent_id' => 17
        ]);
        //20
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-gallery-settings',
            'parent_id' => 17
        ]);
        //21
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-gallery-settings',
            'parent_id' => 17
        ]);

        //22
        Permission::insertOrIgnore([
            'key' => 'Messages',
            'Value' => 'messages',
            'parent_id' => 0
        ]);
        //23
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-messages',
            'parent_id' => 22
        ]);
        //24
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-messages',
            'parent_id' => 22
        ]);
        //25
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-messages',
            'parent_id' => 22
        ]);
        //26
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-messages',
            'parent_id' => 22
        ]);


        //27
        Permission::insertOrIgnore([
            'key' => 'Transactions',
            'Value' => 'transactions',
            'parent_id' => 0
        ]);
        //28
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-transactions',
            'parent_id' => 27
        ]);
        //29
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-transactions',
            'parent_id' => 27
        ]);
        //30
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-transactions',
            'parent_id' => 27
        ]);
        //31
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-transactions',
            'parent_id' => 27
        ]);


        //32
        Permission::insertOrIgnore([
            'key' => 'Blog Category',
            'Value' => 'blog-category',
            'parent_id' => 0
        ]);
        //33
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-blog-category',
            'parent_id' => 32
        ]);
        //34
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-blog-category',
            'parent_id' => 32
        ]);
        //35
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-blog-category',
            'parent_id' => 32
        ]);
        //36
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-blog-category',
            'parent_id' => 32
        ]);

        //37
        Permission::insertOrIgnore([
            'key' => 'Pages',
            'Value' => 'pages',
            'parent_id' => 0
        ]);
        //38
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-pages',
            'parent_id' => 37
        ]);
        //39
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-pages',
            'parent_id' => 37
        ]);
        //40
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-pages',
            'parent_id' => 37
        ]);
        //41
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-pages',
            'parent_id' => 37
        ]);

        //42
        Permission::insertOrIgnore([
            'key' => 'Business Settings',
            'Value' => 'business-settings',
            'parent_id' => 0
        ]);
        //43
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-business-settings',
            'parent_id' => 42
        ]);
        //44
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-business-settings',
            'parent_id' => 42
        ]);


        //45
        Permission::insertOrIgnore([
            'key' => 'Payment Methods',
            'Value' => 'payment-methods',
            'parent_id' => 0
        ]);
        //46
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-payment-methods',
            'parent_id' => 45
        ]);
        //47
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-payment-methods',
            'parent_id' => 45
        ]);
        //48
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-payment-methods',
            'parent_id' => 45
        ]);
        //49
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-payment-methods',
            'parent_id' => 45
        ]);

        //50
        Permission::insertOrIgnore([
            'key' => 'Faq',
            'Value' => 'faq',
            'parent_id' => 0
        ]);
        //51
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-faq',
            'parent_id' => 50
        ]);
        //52
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-faq',
            'parent_id' => 50
        ]);
        //53
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-faq',
            'parent_id' => 50
        ]);
        //54
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-faq',
            'parent_id' => 50
        ]);

        //55
        Permission::insertOrIgnore([
            'key' => 'Complain',
            'Value' => 'complain',
            'parent_id' => 0
        ]);
        //56
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-complain',
            'parent_id' => 55
        ]);
        //57
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-complain',
            'parent_id' => 55
        ]);

        //58
        Permission::insertOrIgnore([
            'key' => 'Blog',
            'Value' => 'blog',
            'parent_id' => 0
        ]);
        //59
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-blog',
            'parent_id' => 58
        ]);
        //60
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-blog',
            'parent_id' => 58
        ]);
        //61
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-blog',
            'parent_id' => 58
        ]);
        //62
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-blog',
            'parent_id' => 58
        ]);

        //63
        Permission::insertOrIgnore([
            'key' => 'Coupon',
            'Value' => 'coupon',
            'parent_id' => 0
        ]);
        //64
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-coupon',
            'parent_id' => 63
        ]);
        //65
        Permission::insertOrIgnore([
            'key' => 'Create',
            'Value' => 'create-coupon',
            'parent_id' => 63
        ]);
        //66
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-coupon',
            'parent_id' => 63
        ]);
        //67
        Permission::insertOrIgnore([
            'key' => 'Delete',
            'Value' => 'delete-coupon',
            'parent_id' => 63
        ]);

        //68
        Permission::insertOrIgnore([
            'key' => 'Analytics',
            'Value' => 'analytics',
            'parent_id' => 0
        ]);
        //69
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-analytics',
            'parent_id' => 68
        ]);

        //70
        Permission::insertOrIgnore([
            'key' => 'Script Setting',
            'Value' => 'scripts-setting',
            'parent_id' => 0
        ]);
        //71
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-scripts-setting',
            'parent_id' => 70
        ]);
        //72
        Permission::insertOrIgnore([
            'key' => 'Edit',
            'Value' => 'edit-scripts-setting',
            'parent_id' => 70
        ]);

        //73
        Permission::insertOrIgnore([
            'key' => 'Read',
            'Value' => 'read-dashboard',
            'parent_id' => 1

        ]);
    }
}
