<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\MasterPostController;
use App\Http\Controllers\Admin\Master\CategoryController;
use App\Http\Controllers\Admin\Master\TagController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Http\Request;
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
Route::get("/", [WelcomeController::class, "index"]);

Route::get("/about", [PageController::class, "about"]);

// backend routs
Route::get('/dashboard',[DashboardController::class, "index"]);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::prefix('post')->group(function () {
    Route::get('', [PostController::class, "index"]);
    Route::get('categories/{id}', [PostController::class, "categories"]);
    Route::get('tags/{id}', [PostController::class, "tags"]);
    Route::get('/create', [PostController::class, "create"]);
    Route::get('/{id}', [PostController::class, "show"]);
    Route::get('/{id}/edit', [PostController::class, "edit"]);
    Route::post('/', [PostController::class, "store"]);
    Route::put('/{id}', [PostController::class, "update"]);
    Route::delete('/{id}', [PostController::class, "destroy"]);
});

Route::prefix('masterpost')->group(function(){
    Route::get('',[MasterPostController::class,"index"]);
    Route::get('/create',[MasterPostController::class,"create"]);
    Route::get('/{id}',[MasterPostController::class,"show"]);
    Route::get('/{id}/edit',[MasterPostController::class,"edit"]);
    Route::post('/',[MasterPostController::class,"store"]);
    Route::put('/{id}',[MasterPostController::class,"update"]);
    Route::delete('/{id}',[MasterPostController::class,"destroy"]);
});

Route::prefix('category')->group(function (){
    Route::get('', [CategoryController::class, "index"]);
    Route::get('/create', [CategoryController::class, "create"]);
    Route::get('/{id}', [CategoryController::class, "show"]);
    Route::get('/{id}/edit', [CategoryController::class, "edit"]);
    Route::post('/', [CategoryController::class, "store"]);
    Route::put('/{id}', [CategoryController::class, "update"]);
    Route::delete('/{id}', [CategoryController::class, "destroy"]);
});

Route::prefix('tag')->group(function (){
    Route::get('', [TagController::class, "index"]);
    Route::get('/create', [TagController::class, "create"]);
    Route::get('/{id}', [TagController::class, "show"]);
    Route::get('/{id}/edit', [TagController::class, "edit"]);
    Route::post('/', [TagController::class, "store"]);
    Route::put('/{id}', [TagController::class, "update"]);
    Route::delete('/{id}', [TagController::class, "destroy"]);
});
