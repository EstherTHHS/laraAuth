<?php

use App\Http\Controllers\dashController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\testCOntroller;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/shop', function () {
    return view('dash');
});
Route::get('/home', function () {
    return "Hello Home";
});


// ? is optional parmeter if used need to defined parameter
Route::get('/urID/{id?}', [testCOntroller::class, 'show']);

Route::resource('dash', dashController::class);

Auth::routes();

Route::get('/home', [PostController::class, 'index']);

Route::resource('post', PostController::class);
