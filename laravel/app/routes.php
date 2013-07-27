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
<<<<<<< HEAD
	return View::make('home');
	//return View::make('hello');
});
=======
  return View::make('hello');
});
Route::get('/api/{collection}', array('as' => 'collection_call', 'uses' => 'ApiController@request'));
Route::post('/api/{collection}', array('as' => 'collection_call_post', 'uses' => 'ApiController@post'));
>>>>>>> b5a03547235fca0de563130b2f865b0faaef7ea8
