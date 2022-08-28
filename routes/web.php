<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\PostController;
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


// Route::get('/home', function(Request $request){
//     $user = Illuminate\Support\Facades\Auth::user();
//     session('id',$user->id);
//     session('name',$user->name);
//     $sess = $request->session();
//     dd($sess);
//     // redirect('dashboard');
// });

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


// Route::prefix('dashboard')->group(function(){

//     dd(Illuminate\Support\Facades\Auth::user());
//     if(empty(!Illuminate\Support\Facades\Auth::user()))
//     {

//         // session($session);
//     }

//     // Route::get('index/', [DashboardController::class, "index"]);
// });
// function(){
    // dd(Illuminate\Support\Facades\Auth::user());
// }


// Route::get('/phones', [PhoneController::class, "index"])->name('phones');
// Route::get('/phones/search', [PhoneController::class, "search"])->name('phones');
// Route::get('/phones/create', [PhoneController::class, "create"])->name('phone-create');
// Route::get('/phones/{id}', [PhoneController::class, "show"])->name('phone');
// Route::post('/phones', [PhoneController::class, "store"])->name('phone-store');
// Route::get('/phones/{id}/edit', [PhoneController::class, "edit"])->name('phone-edit');
// Route::put('/phones/{id}', [PhoneController::class, "update"])->name('phone-update');
// Route::delete('/phones/{id}', [PhoneController::class, "destroy"])->name('phone-destroy');
