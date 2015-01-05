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


Route::group(['before' => 'auth'], function() {

  Route::get('/', 'DemoController@index');

  Route::get('demo/create', array(
    'as'    => 'demo-create',
    'uses'  => 'DemoController@create'
  ));

  Route::get('demo/{id}', array(
    'as'     => 'demo-details',
    'uses'   => 'DemoController@show'
  ));

  Route::get('demo/{id}/edit/', array(
    'as'     => 'demo-edit',
    'uses'   => 'DemoController@edit'
  ));

  // assign demo
  Route::get('demo/{id}/assign/', array(
    'as'    => 'demo-assign',
    'uses'  => 'DemoController@assign'
  ));

  Route::get('/calendar', function(){
    return View::make('calendar.main');
  });

  /**
    * use api route to get all assigned demos.
    * ex. /api/demoevents/json/{{id}}
  **/

  Route::delete('demo/{id}', array(
    'as'    => 'demo-delete',
    'uses'  => 'DemoController@destroy'
   ));

  /**
    * Profile Routes
  **/
  Route::get('profile/{username}', array(
     'as'   => 'profile',
     'uses' => 'ProfileController@profile'
  ));


  /**
    * CSRF Protection
  **/
  Route::group(['before' => 'csrf'], function() {

    Route::post('demo/{id}/edit', array(
      'as'    => 'demo-edit-post',
      'uses'  => 'DemoController@update'
    ));


    Route::post('demo/create', array(
     'as'     => 'demo-create-post',
     'uses'   => 'DemoController@store'
    ));

    Route::post('demo/{id}/assign', array(
      'as'    => 'demo-assign-post',
      'uses'  => 'DemoController@assignPost'
    ));
  });

});


Route::get('users/reset_password/{token}', array(
  'as'    => 'password-reset',
  'uses'  => 'UsersController@resetPassword'
));
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');


// Confide routes

Route::group(['before' => 'guest'], function() {
  Route::get('users/create', 'UsersController@create');
  Route::get('users/login', 'UsersController@login');
  Route::get('users/confirm/{code}', 'UsersController@confirm');
  Route::get('users/forgot_password', 'UsersController@forgotPassword');


  Route::group(['before' => 'csrf'], function(){
     Route::post('users', 'UsersController@store');
     Route::post('users/login', 'UsersController@doLogin');
     Route::post('users/forgot_password', 'UsersController@doForgotPassword');
  });

});


// adding roles -- tech sales and sales

/*Route::get('role/sales', function() {
  $sales = new Role;
  $sales->name = 'Sales';

  if  ($sales->save()) {
    return 'Sales role created';
  }
});

Route::get('role/techsales', function() {
  $techsales = new Role;
  $techsales->name = 'Tech Sales';

  if ($techsales->save()) {
    return 'Techsales role created';
  }
});*/