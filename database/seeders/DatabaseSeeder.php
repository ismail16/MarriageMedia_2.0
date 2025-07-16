<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // Country, States, Tax, TimeZone Seeders
        $this->call(CountryTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(SettingSeeder::class);

        // User & Permission Seeders
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AssignPermissionsTableSeeder::class);
    }
}
