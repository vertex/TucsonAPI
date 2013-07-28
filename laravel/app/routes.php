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

Route::get('/', array('as' => '_home', 'uses' => 'HomeController@showWelcome'));
Route::post('/login', array('as' => '_login', 'uses' => 'HomeController@showDashboard'));
Route::get('/api/{collection}', array('as' => 'collection_call', 'uses' => 'HomeController@fakeData'));
Route::post('/api/{collection}', array('as' => 'collection_call_post', 'uses' => 'ApiController@request'));
//Route::put('/api/{collection}', array('as' => 'collection_call_post', 'uses' => 'ApiController@request'));
Route::get('/cron/nightly', array('as' => 'cron_nightly', 'uses' => 'CronController@nightly'));
