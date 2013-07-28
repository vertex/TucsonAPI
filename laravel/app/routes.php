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
Route::get('/api/{collection}', array('as' => 'collection_call', 'uses' => 'ApiController@request'));
Route::post('/api/{collection}', array('as' => 'collection_call_post', 'uses' => 'ApiController@post'));
Route::get('/cron/nightly', array('as' => 'cron_nightly', 'uses' => 'CronController@nightly'));