<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/about-us', function () {
        return view('about-us');
    })->name('about-us');
    Route::get('/contact-us', function () {
        return view('contact-us');
    })->name('contact-us');
});

//HOME CONTROLLER--------------------------
Route::get('/redirect',[HomeController::class, 'redirect']);

Route::get('/game_details/{id}',[HomeController::class, 'game_details']);
Route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);
Route::get('/show_cart',[HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class, 'remove_cart']);

Route::get('/cash_order',[HomeController::class, 'cash_order']);
Route::get('/show_orders',[HomeController::class, 'show_orders']);
Route::get('/cancel_order/{id}',[HomeController::class, 'cancel_order']);

Route::get('/search_game',[HomeController::class, 'search_game']);
Route::get('/search_games',[HomeController::class, 'search_games']); //for all_games
Route::get('/games',[HomeController::class, 'games']);


//ADMIN CONTROLLER--------------------------
Route::get('/view_category',[AdminController::class, 'view_category']);
Route::post('/add_category',[AdminController::class, 'add_category']);
Route::get('/delete_category/{id}',[AdminController::class, 'delete_category']);

// Route::get('/admin_dashboard', function () { return view('admin.home');});
Route::get('/view_game',[AdminController::class, 'view_game']);
Route::post('/add_game',[AdminController::class, 'add_game']);
Route::get('/show_game',[AdminController::class, 'show_game']);
Route::get('/delete_game/{id}',[AdminController::class, 'delete_game']);
Route::get('/edit_game/{id}',[AdminController::class, 'edit_game']);
Route::post('/edit_game_confirm/{id}',[AdminController::class, 'edit_game_confirm']);

Route::get('/order',[AdminController::class, 'order']);
Route::get('/delivered/{id}',[AdminController::class, 'delivered']);
Route::get('/search',[AdminController::class, 'searchdata']);

