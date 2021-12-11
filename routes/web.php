<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\RegisteredUserController;


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
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
// Route::get('admin/userAdd', [UserController::class, 'showUserAdd'])->name('userAdd');;


Route::get('admin', function () {
    return redirect('/admin/dashboard');
});

// Route::resource('admin/users', 'RegisteredUserController', ['as' => 'adminUsers']);

Route::prefix('admin/')->group(function () {
    Route::resource('users', 'RegisteredUserController');
    Route::get('login', [AdminController::class, 'login'])->name('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
