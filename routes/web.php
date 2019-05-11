<?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');
Route::get('/products', 'ProductController@get');
Route::get('/{any}', 'SpaController')
    ->where('any', '^.*$')  ;
