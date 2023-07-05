<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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


Route::controller(AuthController::class)->group(function() {
    Route::get('register', 'register')->name("register.index");
    Route::post('register', 'registerSave')->name("register.save");

    Route::get('login', 'login')->name("login.index");
    Route::post('login', 'loginAction')->name("login.action");

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::middleware('auth')->group(function() {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('mon-profil', [UserController::class, 'profil'])->name('profil');
    Route::get('parametre-profile', [UserController::class, 'profilParametre'])->name('profil.parametre');
    Route::put('parametre-profil-edition', [UserController::class, 'profilEdition'])->name('profil.edition');

});

