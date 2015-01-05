<?php

class DemoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $demos = Demo::orderBy('created_at', 'desc')->get();

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
      $demo->user_id         = Auth::user()->id;

      $demo->save();

      return Redirect::to('/')->with('success', 'Demo has been successfully created!');
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

      return Redirect::to('/')->with('success', 'Demo has been updated!');

	  } else {
	  	return Redirect::to('/demo/{id}/edit')->with('error_message', 'Something went wrong.');
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

    return Redirect::to('/')->with('error_message', 'Demo has been deleted');
	}

  public function assign($id)
  {
    $demo = Demo::find($id);

    if ($demo) {
      $users = User::all();
      return View::make('demo.assign')->with('demo', $demo)->with('users', $users);
    } else {
      return App::abort('404');
    }
  }

  public function assignPost($id)
  {
    $demo = Demo::find($id);

    if ($demo) {
      $user_id  = Input::get('user_assign');

      $demo->users()->attach($user_id);

      return Redirect::to('/')->with('success', 'Demo successfully assigned');
    } else {
      return Redirect::route('demo-assign')->with('error_message', 'Demo Could Not Be Assigned');
    }
  }

}
