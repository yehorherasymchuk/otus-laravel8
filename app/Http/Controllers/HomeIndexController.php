<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeIndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        return "Hello from Controller: invoke";
    }
}
