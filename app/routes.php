<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('admin/sections', function () {

    return View::make('admin/sections/list');

});

Route::get('admin/sections/create', function () {

    return View::make('admin/sections/create');

});

Route::post('admin/sections', function () {

    $data = Input::all();

    $rules = array(
      'name'     => 'required',
      'slug_url' => 'required',
      'menu'     => 'in:1,0',
      'type'     => 'required|in:page,blog'
    );

    $validator = Validator::make($data, $rules);

    if ($validator->passes())
    {
        $section = Section::create($data);
        return Redirect::to('admin/sections/'. $section->id);
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator->messages());
    }

});

Route::get('admin/sections/{id}', function ($id) {

    $section = Section::find($id);
    return View::make('admin/sections/show')->with('section', $section);

});