<?php

namespace Database\Seeders;

use App\Models\Admin\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::where('id', '>', '0')->delete();
        $file = fopen(public_path("cities.csv"), "r");
        while (($data = fgetcsv($file, 0, ",")) !== FALSE) {
            City::insertOrIgnore(
                [
                    'id' => isset($data[0]) ? $data[0] : null,
                    'name' => isset($data[1]) ? $data[1] : null,
                    'state_id' => isset($data[2]) ? $data[2] : null,
                    'country_id' => isset($data[3]) ? $data[3] : null,
                ]
            );
        }
        fclose($file);
    }
}
