<?php

class AdminSectionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin/sections/list');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin/sections/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Input::all();

        $rules = array(
            'name'     => 'required',
            'slug_url' => 'required',
            'type'     => 'required|in:page,blog',
            'menu'     => 'in:1,0',
            'published' => 'in:1,0',
            'menu_order' => 'integer'
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

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $section = Section::find($id);
        return View::make('admin/sections/show')->with('section', $section);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
