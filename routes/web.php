<?php

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

/**
 * Điều hướng mọi route tới webpage của mình
 * created by phuclv - 13/11/2019
 */
Route::get('/{any}', function () {
    return view('list');
})->where('any', '.*');
