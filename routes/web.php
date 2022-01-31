<?php

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

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('rack/show/{id}', [App\Http\Controllers\RackController::class, 'show'])->name('rack.show');
    Route::get('book/index', [App\Http\Controllers\BookController::class, 'index'])->name('book.index');
    Route::any('book/search', [App\Http\Controllers\BookController::class, 'search'])->name('book.search');

//adminpanel routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/admin/login', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'login'])->name('admin.login');

Route::prefix('admin')->name('admin.')->middleware(['authAdmin','validateAdmin'])->group(function(){
    Route::post('/logout', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\Adminpanel\DashboardrController ::class, 'index'])->name('home');
    //Rack
    Route::prefix('rack')->name('rack.')->group(function(){
        Route::get('/index', [App\Http\Controllers\Adminpanel\RackController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\RackController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\RackController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\RackController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\RackController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\RackController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\RackController::class, 'destroy'])->name('destroy');

    });

    //Book
    Route::prefix('book')->name('book.')->group(function(){
        Route::get('/index', [App\Http\Controllers\Adminpanel\BookController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\BookController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\BookController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\BookController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\BookController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\BookController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\BookController::class, 'destroy'])->name('destroy');

    });

});

