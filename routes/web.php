<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

function defaultRoute($name, $url=null) {
	return Route::inertia($url ?? '/'.strtolower($name), $name)->name($name);
}

defaultRoute('Home', '/');
defaultRoute('About');
defaultRoute('Location');

Route::middleware('guest')->group(function() {
	defaultRoute('Auth');
	defaultRoute('Register');
	Route::post('/login', [UserController::class, 'login'])
		->name('Login')->middleware('precognitive');
	Route::post('/register', [UserController::class, 'register'])->name('RegisterPost')->middleware('precognitive');
});

Route::middleware('auth')->group(function() {
	Route::get('/logout', [UserController::class, 'logout'])->name('Logout');
});

Route::middleware('admin')->group(function() {

});