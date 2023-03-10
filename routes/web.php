<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/projekt', [ProjectController::class, 'index'])->name('page.project');
Route::get('/objekte', [ApartmentController::class, 'index'])->name('page.apartments');
Route::get('/objekte/{apartment}/{slug?}', [ApartmentController::class, 'show'])->name('page.apartment');
Route::get('/ausstattung', [FeaturesController::class, 'index'])->name('page.features');
Route::get('/galerie', [GalleryController::class, 'index'])->name('page.gallery');
Route::get('/kontakt', [ContactController::class, 'index'])->name('page.contact');
Route::get('/preisliste', [DocumentController::class, 'pricelist']);

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
