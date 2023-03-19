<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UsersController::class, 'index']);
Route::post('/users/listJson', [UsersController::class, 'listJson'])->name('users.listJson');

Route::get('/posts', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
