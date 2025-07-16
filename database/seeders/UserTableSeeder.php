<?php

namespace Database\Seeders;

use DB;
use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Passport\Client;
use Illuminate\Database\Seeder;
use App\Models\Admin\DeliveryAgent;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Database\Factories\ClientFactory;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        User::where('id', '>', '0')->delete();

        function generateUID()
        {
            $uid = Str::lower(Str::random(6)) . '_' . now()->format('v');
            $exists = User::where('uid', $uid)->exists();
            if ($exists) {
                return generateUID();
            }
            return $uid;
        }

        User::where('id', '>', '0')->delete();
        $user = User::create([
            'uid' => generateUID(),
            'first_name' => 'User',
            'last_name' => 'User',
            'mobile' => '01700000004',
            'email' => 'user@gmail.com',
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

        DB::table('oauth_clients')->insert([
            'user_id' => null,
            'name' => 'Personal Access Client',
            'secret' => 'oyMe9OSFrJ32gSzfVkiRmmjxHTr45uqinfcZe67h',
            'provider' => null,
            'redirect' => env('APP_URL') ? env('APP_URL') : "http://127.0.0.1:8000/",
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        ClientFactory::new()->asPasswordClient()->create(['user_id' => null]);
    }
}
