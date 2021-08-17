<?php

namespace Database\Seeders;

use App\Models\Continent;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ContinentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createContinentIfNotExists('Europe', 'EU');
        $this->createContinentIfNotExists('Asiaa', 'ASA');
        $this->createContinentIfNotExists('Africas', 'AFA');
    }

    private function createContinentIfNotExists(string $name, string $code): void
    {
        $continent = $this->getContinentByName($name, $code);
        if ($continent) {
            Continent::create([
                'name' => $name,
                'code' => $code,
            ]);
        }
    }

    private function getContinentByName(string $name, ?string $code = null): bool
    {
        $qb = DB::table('continents');
        if ($name) {
            $qb->where('name', $name);
        }
        return $qb->count() > 0;
    }


}
