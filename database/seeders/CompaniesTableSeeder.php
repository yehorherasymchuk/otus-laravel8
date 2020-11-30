<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (City::all() as $city) {
            Company::factory(10)->create([
                'city_id' => $city->id,
            ]);
        }
    }
}
