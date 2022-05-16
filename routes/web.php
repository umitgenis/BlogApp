<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/detail/{id}', [PostController::class, 'detail'])->name('detail');

Auth::routes();

Route::middleware('auth')->group(function (){
    Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create');
    Route::post('/create', [\App\Http\Controllers\PostController::class, 'store'])->name('create.store');
    Route::get('/update/{id}', [\App\Http\Controllers\PostController::class, 'updateView'])->name('updateView');
    Route::post('/update/{id}', [\App\Http\Controllers\PostController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [\App\Http\Controllers\PostController::class, 'delete'])->name('delete');
    Route::post('comment/{id}', [\App\Http\Controllers\PostController::class, 'commentCreate'])->name('commentCreate');

});

Route::fallback([HomeController::class, 'index']);

