<?php

class AdminSectionsController extends \BaseController {

    protected $rules = array(
        'name'     => 'required',
        'slug_url' => 'required',
        'type'     => 'required|in:page,blog',
        'menu'     => 'in:1,0',
        'published' => 'in:1,0',
        'menu_order' => 'integer'
    );

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sections = Section::search(Input::all(), Base::PAGINATE);

        return View::make('admin/sections/list', compact('sections'));
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

        $validator = Validator::make($data, $this->rules);

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
        $section = Section::findOrFail($id);
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
        $section = Section::findOrFail($id);
        return View::make('admin/sections/edit')->with('section', $section);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $section = Section::findOrFail($id);

        $data = Input::all();

        $validator = Validator::make($data, $this->rules);

        if ($validator->passes())
        {
            $section->fill($data);
            $section->save();
            return Redirect::route('admin.sections.show', $section->id);
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $section = Section::findOrFail($id);
        $section->delete();

        return Redirect::route('admin.sections.index');
	}


}
