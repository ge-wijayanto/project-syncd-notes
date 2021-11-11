<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::middleware(['guest'])->group(function() {
    Route::get('/', function() {
        return view('landing');
    });
    Route::get('/login', 'CustomAuthController@index')->name('login');
    Route::get('/register', 'CustomAuthController@registration')->name('register');
    Route::post('/login', 'CustomAuthController@customLogin')->name('login.custom'); 
    Route::post('/register', 'CustomAuthController@customRegistration')->name('register.custom');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/signout', 'CustomAuthController@signOut')->name('signout');
    Route::get('/profile', function() {
        return view('profile');
    });
    Route::get('/profile/edit', function() {
        return view('edit.profile');
    });
    Route::get('/password/edit', function() {
        return view('edit.password');
    });
});