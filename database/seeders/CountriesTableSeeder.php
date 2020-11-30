<?php

namespace Database\Seeders;

use App\Models\Country;
use DB;
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

        Country::factory(10)->create();

    }
}
