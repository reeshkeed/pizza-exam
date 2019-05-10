<?php

Route::get('/{any}', 'SpaController')
    ->where('any', '^.*$');
