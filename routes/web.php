<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RoundTourController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/projekt', [ProjectController::class, 'index'])->name('page.project');
// Route::get('/lage', [LocationController::class, 'index'])->name('page.location');
Route::get('/objekte', [ApartmentController::class, 'index'])->name('page.apartments');
Route::get('/ausstattung', [FeaturesController::class, 'index'])->name('page.features');
Route::get('/galerie', [GalleryController::class, 'index'])->name('page.gallery');
Route::get('/360-rundgang', [RoundTourController::class, 'index'])->name('page.round-tour');
Route::get('/kontakt', [ContactController::class, 'index'])->name('page.contact');


/*
|--------------------------------------------------------------------------
| Protected Web Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:sanctum', 'verified')->group(function() {
  Route::get('/administration/{any?}', function () {
    return view('spa.app');
  })->where('any', '.*');
});
