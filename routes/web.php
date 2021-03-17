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
    Route::resource('/exemplaries', 'ExemplaryController')->except('index');
    Route::get('works/{id}/exemplaries', 'ExemplaryController@index')->name('workExemplaries');
    Route::get('images/{filename}', function ($filename)
    {
        $path = storage_path() . '/app/public/' . $filename;

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    });




});