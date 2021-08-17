<?php

namespace Database\Seeders;

use App\Models\Continent;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Continent::all() as $continent) {
            Country::factory(50)->create([
                'continent_id' => $continent,
            ]);
        }

    }
}
