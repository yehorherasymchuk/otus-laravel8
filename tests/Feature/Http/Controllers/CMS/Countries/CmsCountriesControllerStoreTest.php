<?php
/**
 * Description of CmsCountriesControllerIndexTest.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace Tests\Feature\Http\Controllers\CMS\Countries;


use App\Models\User;
use App\Services\Countries\Repositories\EloquentCountryRepository;
use App\Services\Routes\Providers\CMS\CMSRoutes;
use Tests\Generators\UsersGenerator;
use Tests\TestCase;

class CmsCountriesControllerStoreTest extends TestCase
{

    private function getEloquentCountryRepository(): EloquentCountryRepository
    {
        return app(EloquentCountryRepository::class);
    }

    /**
     * @group cms
     * @group store
     */
    public function testRedirectsNotAuthenticatedUsers()
    {
        $response = $this->post(
            route(CMSRoutes::CMS_COUNTRIES_STORE),
        );

        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    /**
     * @group cms
     * @group store
     */
    public function testStoreRedirectsOnIndexIfSuccess()
    {
        $user = UsersGenerator::generateAdmin();

        $data = [
            'name' => 'Russia',
            'continent_name' => 'Europe',
        ];
        $response = $this->actingAs($user)->post(
            route(CMSRoutes::CMS_COUNTRIES_STORE),
            $data,
        );
        $response->assertStatus(302)
            ->assertRedirect(route(CMSRoutes::CMS_COUNTRIES_INDEX));
    }


    /**
     * @group cms
     * @group store
     */
    public function testStoreRedirectsBackWithErrors()
    {
        $user = UsersGenerator::generateAdmin();

        $data = [
            'continent_name' => 'Europe',
        ];
        $response = $this->from(route(CMSRoutes::CMS_COUNTRIES_CREATE))
            ->actingAs($user)
            ->post(
                route(CMSRoutes::CMS_COUNTRIES_STORE),
                $data,
            );
        $response->assertStatus(302)
            ->assertRedirect(route(CMSRoutes::CMS_COUNTRIES_CREATE))
            ->assertSessionHasErrors([
                'name',
            ]);
    }


    /**
     * @group cms
     * @group store
     */
    public function testStoreCountry()
    {
        $user = UsersGenerator::generateAdmin();

        $data = [
            'name' => 'Russia',
            'continent_name' => 'Europe',
        ];
        $this->from(route(CMSRoutes::CMS_COUNTRIES_CREATE))
            ->actingAs($user)
            ->post(
                route(CMSRoutes::CMS_COUNTRIES_STORE),
                $data,
            );

        $createdCountry = $this->getEloquentCountryRepository()->findByName($data['name']);
        $this->assertNotNull($createdCountry);
    }

}
