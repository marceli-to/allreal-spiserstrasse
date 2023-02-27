<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

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
Route::get('/projekt', [ProjectController::class, 'index'])->name('page.project');

Route::middleware('auth:sanctum', 'verified')->group(function() {
  Route::get('/administration/{any?}', function () {
    return view('spa.app');
  })->where('any', '.*');
});
