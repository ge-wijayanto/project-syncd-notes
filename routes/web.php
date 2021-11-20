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
    Route::get('/dashboard', 'CustomAuthController@dashboard')->name('dashboard');
    Route::post('/signout', 'CustomAuthController@signOut')->name('signout');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/profile/edit', 'ProfileController@showEditProfile')->name('profile.edit');
    Route::get('/password/edit', 'ProfileController@showEditPassword')->name('password.edit');
    Route::patch('/profile/edit', 'ProfileController@updateProfile')->name('profile.update');
    Route::patch('/password/edit', 'ProfileController@updatePassword')->name('password.update');
    Route::post('/dashboard/create', 'ProjectController@store');
    Route::get('/project/view/{id}', 'ProjectController@view');
    Route::get('/project/delete/{id}', 'ProjectController@delete');

    // Task
    Route::get('/project/view/{id}/create', 'TaskController@create');
    Route::get('/project/view/{id}/detail/{idTask}', 'TaskController@detail');
    Route::get('/project/view/{id}/detail/{idTask}/edit', 'TaskController@edit');
});