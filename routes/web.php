<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->middleware(\App\Http\Middleware\IsAdmin::class)->group(function (){
    Route::resource('categories','CategoryController');
    Route::resource('posts','PostController');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

});
