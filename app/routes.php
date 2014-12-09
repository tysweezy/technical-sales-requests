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


Route::delete('demo/{id}', array(
  'as'    => 'demo-delete',
  'uses'  => 'DemoController@destroy'
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
});

