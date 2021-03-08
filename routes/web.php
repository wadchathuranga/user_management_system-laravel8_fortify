<?php

use Illuminate\Support\Facades\Route;

use Admin\UserController;
use User\ProfileController;

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

Route::middleware(['verified'])->get('/', function () {
    return view('index');
});


Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function (){
    Route::resource('/user', UserController::class);

});


Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function (){
    Route::get('profile', ProfileController::class)->name('profile');

});
