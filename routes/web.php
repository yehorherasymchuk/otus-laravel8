<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$cmsRoutesProvider = app(\App\Services\Routes\Providers\CMS\CMSRoutesProvider::class);
$cmsRoutesProvider->registerRoutes();


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeIndexController::class, 'index'])->name('home');
