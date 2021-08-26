<?php

namespace App\Http\Controllers\Api\Continents;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use Illuminate\Http\Request;

class ApiContinentController extends Controller
{

    public function index()
    {
       return response()->json(
           Continent::all(),
       );
    }

    public function store(Request $request)
    {
        $model = Continent::create($request->all());
        return response()->json($model);
    }

    public function update(Request $request, Continent $continent)
    {
        $continent->update($request->all());
        return response()->json($continent);
    }
}
