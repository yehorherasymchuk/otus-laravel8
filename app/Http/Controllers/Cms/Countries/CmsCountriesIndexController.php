<?php

namespace App\Http\Controllers\Cms\Countries;


use View;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CmsCountriesIndexController extends Controller
{

    public function __invoke(Request $request)
    {
        View::share([
            'countries' => Country::paginate(),
        ]);

        return view('countries.index');
    }
}
