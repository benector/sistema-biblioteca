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
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('/subjects', 'SubjectController');
    Route::get('/', 'CollectionController@index')->name('home');
    Route::post('collection/search', 'CollectionController@search')->name('search');
    Route::resource('/users','UserController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/courses', 'CourseController');
    Route::resource('/works', 'WorkController');
    Route::resource('/subjects', 'SubjectController');


});