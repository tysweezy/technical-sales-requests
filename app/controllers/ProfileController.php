<?php

class ProfileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /profile
	 *
	 * @return Response
	 */
	public function profile($username)
	{
	  $user = User::where('username', '=', $username);

	  if ($user->count()) {
	  	$user = $user->first();


      return View::make('profile.main')->with('user', $user);
	  } else {
	  	return App::abort('404');
	  }
	}
}