<?php

use App\Http\Controllers\SocialsController;
use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/users/login', function () {
    return view('users.login');
})->name('users.login');

Route::post('/users/CheckLogin', [UsersController::class, 'CheckLogin'])->name('users.CheckLogin');
Route::post('/users/logout', [UsersController::class, 'logout'])->name('users.logout');
Route::middleware(['auth'])->group(function () {



    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    

    Route::get('/socials/create/{id}', [SocialsController::class, 'create'])->name('socials.create');
    Route::post('/socials', [SocialsController::class, 'store'])->name('socials.store');
    Route::delete('/socials/{id}', [SocialsController::class, 'destroy'])->name('socials.destroy');


    Route::get('/businesses', [BusinessController::class, 'index'])->name('businesses.index');
    Route::get('/businesses/create/{id}', [BusinessController::class, 'create'])->name('businesses.create');
    Route::post('/businesses', [BusinessController::class, 'store'])->name('businesses.store');
    Route::get('/businesses/{business}', [BusinessController::class, 'show'])->name('businesses.show');
    Route::get('/businesses/{id}/edit', [BusinessController::class, 'edit'])->name('businesses.edit');
    Route::put('/businesses/{business}', [BusinessController::class, 'update'])->name('businesses.update');
    Route::delete('/businesses/{id}', [BusinessController::class, 'destroy'])->name('businesses.destroy');

});


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