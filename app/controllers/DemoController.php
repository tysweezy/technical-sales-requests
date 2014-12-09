<?php

class DemoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $demos = Demo::all();

    return View::make('index')->with('demos', $demos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('demo.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validation rules
		$rules = array(
      'title'         => 'required',
      'description'   => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
      return Redirect::to('demo/create')
      					->withErrors($validator)
      					->withInput();
		} else {
      $demo = new Demo;

      $demo->name            = Input::get('title');
      $demo->description     = Input::get('description');

      $demo->save();

      return Redirect::to('/')->with('message', 'Demo has been successfully created!');
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
		$demo = Demo::find($id);

    if ($demo) {
    	return View::make('demo.demo')->with('demo', $demo);
    } else {
    	App::abort('404');
    }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $demo = Demo::find($id);

    return View::make('demo.edit')->with('demo', $demo);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$demo = Demo::find($id);

	  if ($demo) {
	  	$demo->name          = Input::get('name');
	  	$demo->description   = Input::get('description');
      $demo->save();

      return Redirect::to('/')->with('message', 'Demo has been updated!');

	  } else {
	  	return Redirect::to('/demo/{id}/edit')->with('message', 'Something went wrong.');
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
		$demo = Demo::find($id);

    $demo->delete();

    return Redirect::to('/')->with('message', 'Demo has been deleted');
	}


}
