<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [HomeController::class, 'index'])->name("home");


Route::controller(AuthController::class)->group(function() {
    Route::get('register', 'register')->name("register.index");
    Route::post('register', 'registerSave')->name("register.save");

    Route::get('login', 'login')->name("login.index");
    Route::post('login', 'loginAction')->name("login.action");

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::middleware('auth')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('mon-profil', [UserController::class, 'profil'])->name('profil');
    Route::get('parametre-profile', [UserController::class, 'profilParametre'])->name('profil.parametre');
    Route::put('parametre-profil-edition', [UserController::class, 'profilEdition'])->name('profil.edition');
    Route::put('edition-mot-de-passe', [UserController::class, 'passwordEdit'])->name('edition.password');
    Route::put('edition-image', [UserController::class, 'imageEdit'])->name('edition.image');

    Route::prefix('user')->group(function () {
        Route::get('/list', [UsersController::class, 'index'])->name('user.index');
        Route::get('/create', [UsersController::class, 'create'])->name('user.create');
        Route::post('/create', [UsersController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
        Route::put('/edit/profil/{id}', [UsersController::class, 'update'])->name('user.update');
        Route::put('/edit/image/{id}', [UsersController::class, 'updateImage'])->name('user.image.update');
        Route::put('/edit/password/{id}', [UsersController::class, 'updatePassword'])->name('user.password.update');
        Route::get('/show/{id}', [UsersController::class, 'show'])->name('user.show');
        Route::get('/delete/{id}', [UsersController::class, 'destroy'])->name('user.delete');
        Route::get('/search/user', [UsersController::class, 'searchUsers'])->name('search.users');
        Route::get('/import', [UsersController::class, 'importIndex'])->name('users.import.index');
        Route::get('/users-export', [UsersController::class, 'export'])->name('users.export');
        Route::post('/users-import', [UsersController::class, 'import'])->name('users.import');
    });

    Route::prefix('categorie')->group(function () {
        Route::get('/list', [CategorieController::class, 'index'])->name('categorie.index');
        Route::get('/create', [CategorieController::class, 'create'])->name('categorie.create');
        Route::post('/store', [CategorieController::class, 'store'])->name('categorie.store');
        Route::get('/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
        Route::put('/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
        Route::delete('/destroy/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');
        Route::get('/show-product-by-categorie/{id}', [CategorieController::class, 'showProduitsByCategorie'])->name('categorie.show.products');
        Route::get('/product/create/{id}', [ProductController::class, 'create'])->name('products.index');
        Route::post('/product/create/{id}', [ProductController::class, 'store'])->name('product.create');
        Route::get('/product/edit/{idCat}/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/update/{idCat}/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product/show/{idCat}/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/product/search/{idCat}', [ProductController::class, 'searchProduct'])->name('product.search');
        Route::delete('/product/delete/{idCat}/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    });


    Route::prefix('product')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'createProduct'])->name('products.create.index');
        Route::post('/store', [ProductController::class, 'storeProduct'])->name('products.store.index');
        Route::get('/edit', [ProductController::class, 'editProduct'])->name('products.edit.index');
        Route::put('/edit', [ProductController::class, 'updateProduct'])->name('products.upadte.index');
        Route::delete('/delete', [ProductController::class, 'deleteProduct'])->name('products.delete.index');
    });


});

