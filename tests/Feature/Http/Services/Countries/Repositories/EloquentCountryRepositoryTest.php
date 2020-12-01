<?php
/**
 * Description of EloquentCountryRepositoryTest.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace Tests\Feature\Http\Services\Countries\Repositories;


use App\Services\Countries\Repositories\EloquentCountryRepository;
use Tests\Generators\CountriesGenerator;
use Tests\TestCase;

class EloquentCountryRepositoryTest extends TestCase
{

    private function getEloquentCountryRepository(): EloquentCountryRepository
    {
        return app(EloquentCountryRepository::class);
    }

    /**
     * @group t1
     */
    public function testFindById()
    {
        $country = CountriesGenerator::generateRussia();

        $result = $this->getEloquentCountryRepository()->find($country->id);
        $this->assertEquals($country->toArray(), $result->toArray());
    }

    /**
     * @group t1
     */
    public function testFindByIdReturnNullIfNonExisting()
    {
        $result = $this->getEloquentCountryRepository()->find(403);
        $this->assertNull($result);
    }

    /**
     * @group t1
     */
    public function testFindByNameReturnNullIfNonExisting()
    {
        $result = $this->getEloquentCountryRepository()->findByName('fdsf');
        $this->assertNull($result);
    }

    /**
     * @group t1
     */
    public function testFindByNameReturnNullIfNameInt()
    {
        $result = $this->getEloquentCountryRepository()->findByName(3423);
        $this->assertNull($result);
    }

    /**
     * @group t1
     */
    public function testFindByNameReturnCountry()
    {
        $country = CountriesGenerator::generateRussia();

        $result = $this->getEloquentCountryRepository()->findByName($country->name);
        $this->assertEquals($country->toArray(), $result->toArray());
    }

}
