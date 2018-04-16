<?php

Route::get('/', function () {
    return view('auth.login');
});



Route::group(['Middleware' => ['web']], function () {

    Route::get('/index', ['uses' => 'MusicController@getMusicView']);
    Route::any('/index/add', ['uses' => 'MusicController@add']);
    Route::any('/index/uploads', ['uses' => 'MusicController@uploads']);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', ['uses' => 'UserController@getUserInfor']);
        Route::any('/create', ['uses' => 'UserController@create']);
        Route::any('/save', ['uses' => 'UserController@save']);
        Route::any('/update/{id}', ['uses' => 'UserController@update']);
        Route::any('/detail/{id}', ['uses' => 'UserController@detail']);
        Route::any('/delete/{id}', ['uses' => 'UserController@delete']);
    });

    Route::group(['prefix' => 'music'], function () {
        Route::post('/', ['uses' => 'MusicController@getMusicInfor']);
        Route::post('/delete', ['uses' => 'MusicController@deleteMusic']);
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
