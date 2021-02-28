<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\UsersController;

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

Route::get('/contact', function (){
    return view('contact');
});

Route::get('/about', function (){
    return view('about');
});

Route::get('/terms-conditions', function (){
    return view('terms');
});

Route::get('/privacy-policy', function (){
    return view('privacy');
});

Route::get('/shipping-policy', function (){
    return view('shipping');
});

Route::get('/return-policy', function (){
    return view('return');
});

Route::get('/user/{id}', [UsersController::class, 'show']);
Route::post('/user/{id}', [UsersController::class, 'updateAvatar'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/items/{item}', [PostsController::class, 'show']);

Route::post('/items/{item}', [BidController::class, 'store']);

Route::get('/items/{item}/editBid/{bidId}', [BidController::class, 'edit']);
Route::put('/items/{item}/editBid/{bidId}', [BidController::class, 'update']);

Route::get('/items/{item}/deleteBid/{bidId}', [BidController::class, 'destroy']);

Route::get('/thanks/{slug}/{amount}', [BidController::class, 'thanks']);

Route::get('/admin', [PostsController::class, 'adminIndex'])->middleware('admin');

Route::get('/admin/create', [PostsController::class, 'create'])->middleware('admin');
Route::post('/admin/create', [PostsController::class, 'store'])->middleware('admin');

Route::get('/admin/{item}/edit', [PostsController::class, 'edit'])->middleware('admin');
Route::put('/items/{item}', [PostsController::class, 'update'])->middleware('admin');

Route::get('/admin/{item}/archive', [PostsController::class, 'archive'])->middleware('admin');
Route::get('/admin/{item}/delete', [PostsController::class, 'destroy'])->middleware('admin');
