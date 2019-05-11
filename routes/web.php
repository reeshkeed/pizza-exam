<?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/{any}', 'SpaController')
    ->where('any', '^.*$')  ;
