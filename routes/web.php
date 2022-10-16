<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
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
//Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
//Auth
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function(){
    Route::prefix('dashboard')->group(function () {

        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        //Categories
        Route::resource('categories', CategoryController::class);

        //Tags
        Route::resource('tags', TagController::class);

        //Posts
        //Route::resource('posts', PostController::class);
    });
});







// Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function(){

//     //Dashboard
//     Route::prefix('')->group(function () {
//         Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//     });


//     //Categories
//     Route::resource('categories', CategoryController::class);
//     // Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
//     //     Route::get('/', [CategoryController::class, 'index'])->name('index');
//     //     Route::get('create', [CategoryController::class, 'create'])->name('create');
//     //     Route::post('/', [CategoryController::class, 'store'])->name('store');
//     //     Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit');
//     //     Route::put('{category:slug}', [CategoryController::class, 'update'])->name('update');
//     //     Route::delete('{category:slug}', [CategoryController::class, 'destroy'])->name('destroy');
//     // });
// });