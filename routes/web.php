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

Route::get('/', 'WinesIndexController@index');

Route::get('/wine/listing', 'WinesListingController@listing');

Route::prefix('admin')->group(function () {

    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'AdminDashboardController@dashboard']);

    Route::post('/wines/sync', ['as' => 'admin.sync', 'uses' => 'AdminWinesSyncController@sync']);

    Route::get('/wine/listing', 'WinesListingController@listing');
});
