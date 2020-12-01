<?php
/**
 * Description of CmsCountriesControllerIndexTest.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace Tests\Feature\Http\Controllers\CMS\Countries;


use App\Models\User;
use App\Services\Routes\Providers\CMS\CMSRoutes;
use Tests\Generators\UsersGenerator;
use Tests\TestCase;

class CmsCountriesControllerIndexTest extends TestCase
{

    /**
     * @group cms
     */
    public function testIndexRedirectsNotAuthenticatedUsers()
    {
        $response = $this->get(
            route(CMSRoutes::CMS_COUNTRIES_INDEX),
        );

        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    /**
     * @group cms
     */
    public function testIndexReturns403ForPlainUser()
    {
        $user = UsersGenerator::generatePlain();
        $response = $this->actingAs($user)->get(
            route(CMSRoutes::CMS_COUNTRIES_INDEX),
        );
        $response->assertStatus(403);
    }

    /**
     * @group cms
     */
    public function testIndexReturns200()
    {
        $user = UsersGenerator::generateAdmin();

        $response = $this->actingAs($user)->get(
            route(CMSRoutes::CMS_COUNTRIES_INDEX),
        );
        $response->assertStatus(200);
    }


}
