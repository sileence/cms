<?php

Route::resource('admin/sections', 'AdminSectionsController');

Route::get('/', function()
{
    return View::make('hello');
});