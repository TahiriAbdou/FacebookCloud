<?php

Route::controllers([
    'auth'        => 'Auth\\AuthController',
    'password'    => 'Auth\\PasswordController'
]);

Route::group(['prefix'=>'facebook'],function(){
    Route::get('login','FacebookController@login');
    Route::get('callback','FacebookController@callback');
    Route::get('import','FacebookController@import');
});

Route::get('',function(){
    return redirect('dashboard');
});

Route::get('pages/{slug}','HomeController@pages');

Route::get('sharer',function(){
    return view('sharer.test');
});

Route::group(['prefix'=>'dashboard', 'middleware'=>'auth', 'namespace'=>'Dashboard'], function () {
    
    Route::get('', 'BoardController@index');

    Route::resource('pages', 'PagesController');
    Route::get('pages/{id}/delete', 'PagesController@destroy');

    Route::resource('images', 'ImagesController');
    Route::post('images/saveAjax', 'ImagesController@saveAjax');
    Route::get('images/{id}/delete', 'ImagesController@destroy');

    Route::resource('gifs', 'GifsController');
    Route::get('gifs/{id}/delete', 'GifsController@destroy');

    Route::resource('quizes', 'QuizesController');
    Route::get('quizes/{id}/delete', 'QuizesController@destroy');

    Route::controller('manage','ManageController');

    Route::resource('users', 'UsersController');
    Route::get('users/{id}/delete', 'UsersController@destroy');

    Route::controller('miscellaneous', 'MiscellaneousController');
    Route::controller('settings', 'SettingsController');
    Route::controller('ips', 'IpsController');

    /**
     * for datatables
     */
    Route::group(['prefix'=>'api'], function () {
        Route::get('pages', 'PagesController@datatable');
        Route::get('ips', 'IpsController@datatable');
        Route::get('posts', 'PostsController@datatable');
        Route::get('images', 'ImagesController@datatable');
    });
    
});
