<?php

Route::get('/logs', 'LogController@index')->name('logs');
Route::post('/logs/create', 'LogController@create')->name('log.create');
Route::get('/logs/{log}/edit','LogController@edit')->name('log.edit');
Route::post('/logs/{log}/update','LogController@update')->name('log.update');
Route::post('/logs/{log}/destroy','LogController@destroy')->name('log.destroy');
