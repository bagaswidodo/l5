<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return 'Hello';
});


Route::get('task','TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{id}', 'TaskController@destroy');


//comment SPA
Route::get('comment-spa',function(){
	return view('comment');
});
// API ROUTES ==================================  
Route::group(array('prefix' => 'api'), function() {

    // since we will be using this just for CRUD, we won't need create and edit
    // Angular will handle both of those forms
    // this ensures that a user can't access api/create or api/edit when there's nothing there
    Route::resource('comments', 'CommentController', 
        array('only' => array('index', 'store', 'destroy')));
  
});


//time-tracker
Route::get('time-tracker',function(){
	// return view('time-tracker.index'); //part1 -static version
	return view('time-tracker.index2'); //part2 - dynamic version
});
// A route group allows us to have a prefix, in this case api
Route::group(array('prefix' => 'api'), function()
{
    Route::resource('time', 'TimeEntriesController');
    Route::resource('users', 'UsersController');
});

// CATCH ALL ROUTE =============================  
// all routes that are not home or api will be redirected to the frontend 
// this allows angular to route them 
// App::missing(function($exception) { 
//     return View::make('index'); 
// });