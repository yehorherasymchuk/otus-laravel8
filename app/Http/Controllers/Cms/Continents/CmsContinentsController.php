<?php

namespace App\Http\Controllers\Cms\Continents;

use App\Http\Controllers\Cms\CmsBaseController;
use App\Http\Controllers\Cms\Continents\Requests\StoreContinentFormRequest;
use App\Http\Controllers\Cms\Continents\Requests\UpdateContinentFormRequest;
use App\Services\Continents\ContinentsService;
use View;
use App\Models\Continent;
use Illuminate\Http\Request;

class CmsContinentsController extends CmsBaseController
{

    private function getContinentsService(): ContinentsService
    {
        return app(ContinentsService::class);
    }

    public function index()
    {
        View::share([
            'continents' => $this->getContinentsService()->getContinents(
                self::DEFAULT_MODELS_PER_PAGE,
            ),
        ]);

        return view('cms.continents.index');
    }

    public function create()
    {
        return view('cms.continents.create');
    }

    public function store(StoreContinentFormRequest $request)
    {
        $this->getContinentsService()->createContinent($request->getFormData());
        return redirect()->route(
            'cms.continents.index',
        );
    }

    public function edit(Continent $continent)
    {
        View::share([
            'continent' => $continent,
        ]);

        return view('cms.continents.edit');
    }

    public function update(UpdateContinentFormRequest $request, Continent $continent)
    {
        $continent->update($request->all());
        return redirect()->route(
            'cms.continents.index',
        );
    }
}
