<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/payments/stripe/start-session', \App\Http\Controllers\Payments\Stripe\Checkout\SessionCreate::class );


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{user}/{lang?}', function (int $id, ?string $locale = null) {
    return response()->json([
        'user' => Auth::user(),
    ], 200);
})->middleware('auth:api');
