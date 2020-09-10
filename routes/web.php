<?php
Route::group(['middleware' => 'auth'], function() {
    Route::get('/days/{day}/logs', 'LogController@index')->name('logs');

    Route::post('/days/{day}/logs/create', 'LogController@create')->name('log.create');

    Route::get('/days/{day}/logs/{log}/edit','LogController@edit')->name('log.edit');
    Route::post('/days/{day}/logs/{log}/update','LogController@update')->name('log.update');

    // Route::post('/logs/{log}/destroy','LogController@destroy')->name('log.destroy');
});

Auth::routes();
