<?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');
Route::get('/{any}', 'SpaController')
    ->where('any', '^.*$')  ;
