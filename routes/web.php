<?php

use App\Http\Controllers\RestoranController;
use App\Http\Controllers\MealController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth','administrator'])->group(function() {
    Route::resources([
        'restoran'=> RestoranController::class,
        'meals'=>MealController::class
    ]);
    Route::get('restoran/{id}/meals', [MealController::class, 'restoranMeals'])->name('restoranMeals');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//
//// show create form
//Route::get('/listings/create',[\App\Http\Controllers\RestoranController::class,'create'])->middleware('auth');
//
//// store listing data
//Route::post('/listings', [\App\Http\Controllers\RestoranController::class, 'store'])->middleware('auth');
//
////show edit form
//Route::get('/listings/{listing}/edit', [\App\Http\Controllers\RestoranController::class, 'edit'])->middleware('auth');
//
//// Update Listing
Route::put('/meals/{meal}', [\App\Http\Controllers\RestoranController::class, 'update'])->middleware('auth');

//
//// Delete Listing
//Route::delete('/listings/{listing}', [\App\Http\Controllers\RestoranController::class, 'destroy'])->middleware('auth');
//
////Manage listings
//Route::get('/listings/manage', [RestoranController::class, 'manage'])->middleware('auth');
//
////show register/create form
//Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->middleware('guest');
//
//// create new user
//Route::post('/users', [UserController::class, 'store']);
//
////Log user out
//Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
//
//// show login form
//Route::get('/login', [UserController::class, 'login'])
//    ->name('login')
//    ->middleware('guest');
//
//// log in user
//Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//
//
//
//// single listing
//Route::get('/listings/{listing}', [\App\Http\Controllers\RestoranController::class, 'show']);
