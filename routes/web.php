<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/detail/{id}', [PostController::class, 'detail'])->name('detail');
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');

Route::middleware('auth')->group(function (){
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/create', [PostController::class, 'store'])->name('create.store');
    Route::get('/update/{id}', [PostController::class, 'updateView'])->name('updateView');
    Route::post('/update/{id}', [PostController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete');
    Route::post('comment/{id}', [PostController::class, 'commentCreate'])->name('commentCreate');

});

Auth::routes();
Route::fallback([HomeController::class, 'index']);

