<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\APIsController;
use App\Http\Controllers\APIs\PlanController;
use App\Http\Controllers\APIs\GeoController;
use App\Http\Controllers\TenantController;

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

// churches
Route::post('church', [TenantController::class, 'store']);
Route::get('churches/domain/{domain}', [APIsController::class, 'churchesDomain']);
Route::get('churches/check/{church}', [APIsController::class, 'churchesCheck']);
Route::get('churches/{church}', [APIsController::class, 'churches'])->name('churches');

// plans
Route::post('/plans', [PlanController::class, 'index']);

// geo
Route::group(['prefix' => 'geo'], function()
{
    Route::get('/index/{country?}', [GeoController::class, 'index']);
    Route::get('/countries', [GeoController::class, 'country']);
    Route::get('/states/{country_id}', [GeoController::class, 'state']);
    Route::get('/cities/{state_id}', [GeoController::class, 'city']);
});
