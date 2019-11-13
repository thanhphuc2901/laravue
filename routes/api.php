<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/list/create', 'StudentController@store');
Route::get('/list/edit/{id}', 'StudentController@edit');
Route::post('/list/update/{id}', 'StudentController@update');
Route::delete('/list/delete/{id}', 'StudentController@delete');
Route::get('/lists', 'StudentController@index');
