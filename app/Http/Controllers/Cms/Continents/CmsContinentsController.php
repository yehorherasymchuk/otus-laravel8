<?php

namespace App\Http\Controllers\Cms\Continents;

use App\Http\Controllers\Cms\CmsBaseController;
use App\Http\Controllers\Cms\Continents\Requests\StoreContinentFormRequest;
use App\Http\Controllers\Cms\Continents\Requests\UpdateContinentFormRequest;
use App\Models\User;
use App\Policies\Permission;
use App\Services\Continents\ContinentsService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use View;
use App\Models\Continent;

class CmsContinentsController extends CmsBaseController
{

    private function getContinentsService(): ContinentsService
    {
        return app(ContinentsService::class);
    }

    public function index(Request $request)
    {
        $this->authorize(Permission::VIEW_ANY, Continent::class);

        View::share([
            'continents' => $this->getContinentsService()->getContinents(
                self::DEFAULT_MODELS_PER_PAGE,
            ),
        ]);

        return view('cms.continents.index');
    }

    public function create()
    {
        $this->authorize(Permission::CREATE, Continent::class);

        return view('cms.continents.create');
    }

    public function store(StoreContinentFormRequest $request)
    {
        $this->authorize(Permission::CREATE, Continent::class);

        $this->getContinentsService()->createContinent($request->getFormData());
        return redirect()->route(
            'cms.continents.index',
        );
    }

    public function edit(Continent $continent)
    {
        $this->authorize(Permission::UPDATE, $continent);

        View::share([
            'continent' => $continent,
        ]);

        return view('cms.continents.edit');
    }

    public function update(UpdateContinentFormRequest $request, Continent $continent)
    {
        $this->authorize(Permission::UPDATE, $continent);

        $continent->update($request->all());
        return redirect()->route(
            'cms.continents.index',
        );
    }
}
