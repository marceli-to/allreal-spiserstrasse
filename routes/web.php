<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//   return view('web.app');
// });

Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/wohnungen', [ApartmentController::class, 'index'])->name('page.apartments');
Route::get('/projekt', [ProjectController::class, 'index'])->name('page.project');
Route::get('/kontakt', [ContactController::class, 'index'])->name('page.contact');

Route::middleware('auth:sanctum', 'verified')->group(function() {
  Route::get('/administration/{any?}', function () {
    return view('spa.app');
  })->where('any', '.*');
});
