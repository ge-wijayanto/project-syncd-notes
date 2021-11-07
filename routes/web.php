<?php

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

Route::get('/', function() {
    return view('landing');
});

// Route::get('/login', function() {
//     return view('login');
// })->name('login');

Route::get('/login', 'CustomAuthController@index')->name('login');
Route::post('custom-login', 'CustomAuthController@customLogin')->name('login.custom'); 
Route::get('/register', 'CustomAuthController@registration')->name('register-user');
Route::post('custom-registration', 'CustomAuthController@customRegistration')->name('register.custom');
Route::get('signout', 'CustomAuthController@signOut')->name('signout');