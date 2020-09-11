<?php
Route::group(['middleware' => 'auth'], function() {
    // 初期画面 & 日付作成
    Route::get('/index', 'LogController@index')->name('index');
    // LOGS
    Route::get('/days/{day}/logs', 'LogController@logs')->name('logs');

    // Dayフォーム
    Route::post('/days/create', 'DayController@create')->name('day.create');
    // Logフォーム
    Route::post('/days/{day}/logs/create', 'LogController@create')->name('log.create');
    // Log編集
    Route::get('/days/{day}/logs/{log}/edit','LogController@edit')->name('log.edit');
    Route::post('/days/{day}/logs/{log}/update','LogController@update')->name('log.update');
    // Log削除
    Route::post('/days/{day}/logs/{log}/destroy','LogController@destroy')->name('log.destroy');
});

Auth::routes();
