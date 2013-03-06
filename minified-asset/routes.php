<?php

Route::get('/min-style/(:all)', 'minified-asset::serve@style');
Route::get('/min-script/(:all)', 'minified-asset::serve@script');
Route::get('/', 'minified-asset::test@index');