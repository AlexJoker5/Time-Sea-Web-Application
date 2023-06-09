<?php

use App\Http\Controllers\DetailviewController;
use App\Http\Controllers\ListviewController1;
use App\Http\Controllers\ListViewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CartsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/carousel', function () {
    return view('carousel.carousel');
});

Route::get('/detailview', function () {
    return view('detailview.detailview');
})->name('detailview.detailview');

Route::get('/dashboard', [CarouselController::class, 'index'], )
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/carousel', [CarouselController::class, 'index']);
Route::get('/listview1', [ListviewController1::class, 'listview']);
Route::get('listview1/{index,watch}','ListviewController1@listview');
Route::get('listview1/{watch}','ListviewController1@split_category');
Route::get('/detailview', [DetailviewController::class, 'detail']);

Route::get('/detailview/{index}', [CarouselController::class, 'passId'])->name('carousel.passId');
Route::get('/detailview/{userId}/{watchId}/{price}', [DetailviewController::class, 'addToChart'])->name('detailview.addToChart');
Route::get('detailview/{userId,watchId}','DetailviewController@alreadyExist');
Route::post('/detailview/{userId}', [DetailviewController::class, 'billing'])->name('detailview.billing');

Route::get('/carts',[CartsController::class, 'index'])->name('carts');
Route::post('/carts/{userId}', [CartsController::class, 'billing'])->name('carts.billing');
Route::put('/carts/update-quantity/{id}', [CartsController::class, 'updateQuantity'])->name('carts.update-quantity');
Route::delete('/carts/delete-cart/{id}', [CartsController::class, 'destroy'])->name('carts.delete-cart');

Route::get('/listview/{category}', [ListViewController::class, 'shownByCategory'])->name('listview');





require __DIR__.'/auth.php';
