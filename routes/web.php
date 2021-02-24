<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PostsController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/items/{item}', [PostsController::class, 'show']);

Route::get('/admin', [PostsController::class, 'adminIndex'])->middleware('admin');
Route::get('/admin/create', [PostsController::class, 'create'])->middleware('admin');
Route::post('/admin/create', [PostsController::class, 'store'])->middleware('admin');
