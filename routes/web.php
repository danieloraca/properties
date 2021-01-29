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

Route::get(
    '/',
    'App\Http\Controllers\MainController@index'
)->name('main');

Route::get(
    '/read_api',
    'App\Http\Controllers\ApiController@readApi'
)->name('read_api');

Route::get(
    '/view_property/{id}',
    'App\Http\Controllers\PropertyController@view'
)->name('view_property');

Route::get(
    '/delete_property/{id}',
    'App\Http\Controllers\PropertyController@delete'
)->name('delete_property');

Route::get(
    '/edit_property/{id}',
    'App\Http\Controllers\PropertyController@edit'
)->name('edit_property');

Route::put(
    '/edit_property/{id}',
    'App\Http\Controllers\PropertyController@update'
)->name('edit_property');

Route::get(
    '/edit_property_type/{id}',
    'App\Http\Controllers\PropertyTypeController@edit'
)->name('edit_property_type');

Route::put(
    '/edit_property_type/{id}',
    'App\Http\Controllers\PropertyTypeController@update'
)->name('edit_property_type');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
