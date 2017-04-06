<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@welcome');

Auth::routes();
Route::resource('projects','ProjectsController');
Route::get('/home', 'HomeController@index');
Route::resource('tasks','TasksController');
//Route::resource('charts','Charts\ChartsController');
Route::any('tasks/{id}/check',['as'=>'tasks.check','uses'=>'TasksController@check']);
Route::resource('GA','GA\GaController');
Route::resource('column','Charts\PetColumnController');
Route::resource('google_charts','Charts\GoogleChartsController');
Route::any('focus/{cateid}/{start}/{end}/{type}','FocusController@showCategoryBar');
Route::resource('focus','FocusController');
Route::resource('focusBrand','FocusBrandController');
Route::resource('hot','HotGoodsController');
Route::get('test','TestController@test');