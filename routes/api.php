<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\FormDataController;
use App\Http\Resources\UserResource;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  $isAdmin = $request->user()->isAdmin();
  return UserResource::make($request->user())->withSensitiveAttributes($isAdmin);
});

Route::middleware('auth:sanctum')->group(function() {

  Route::controller(ApartmentController::class)->group(function () {
    Route::get('/apartments/search/{keyword?}', 'search');
    Route::get('/apartments', 'get');
    Route::get('/apartment/{apartment}', 'find');
    Route::put('/apartment/{apartment}', 'update');
  });

});

Route::controller(FormDataController::class)->group(function () {
  Route::post('/contact-form', 'store');
});

