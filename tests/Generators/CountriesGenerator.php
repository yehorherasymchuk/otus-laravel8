<?php
/**
 * Description of CountriesGenerator.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace Tests\Generators;


use App\Models\Country;

class CountriesGenerator
{

    public static function generateRussia(array $data = []): Country
    {
        return self::generate(array_merge([
            'name' => 'Russia',
            'continent_name' => 'Europe',
        ], $data));
    }

    private static function generate(array $data): Country
    {
        if (!empty($data['name'])) {
            if ($country = Country::where('name', $data['name'])->first()) {
                return $country;
            }
        }
        return Country::factory()->create($data);
    }

}
