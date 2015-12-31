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


//spa gallery
Route::get('galeri-spa',function(){
    return view('gallery.index');
    // return 'foo';
});
Route::resource('galeri', 'GalleryController');

Route::post('login','UsersController@checkAuth');


//todo app
Route::get('todos',function(){
    return view('todo.index');
});

use App\Todo;
Route::get('api/todos',function(){
    return Todo::all();
});

Route::post('api/todos',function(){
    return Todo::create(Input::all());
});

// Route::delete('api/todos/{id}',function($id){
//     $data = Todo::findOrFail($id);
//     return Todo::delete($data);
// });


/*
vuejs
*/
Route::get('vuejs',function(){
    return view('vue.index');
});
Route::get('api/notes',function(){
   return \App\Note::latest()->get();
});
Route::get('vue-dynamic',function(){
    return view('vue.dynamic');
});

// crud vuejs
Route::get('student',function(){
    return view('students.index');
});
Route::resource('api/students','StudentController');


//guestbook vuejs
Route::get('gb',function(){
    return view('guestbook.index');
}); 
get('api/guestbook',function(){
    return App\Message::latest()->get();
});
post('api/guestbook',function(){
    App\Message::create(Request::all());
});
Route::delete('api/guestbook/{id}',function($id){
    App\Message::destroy($id);
});


//Angular CRUD
Route::get('ng-customer',function(){
    return view('angular.customer.index');
});
Route::resource('api/customer','CustomerController');

// JWT experiment
Route::get('jspa', function () {
   return view('jwt.index');
});

use App\User;
use Illuminate\Http\Response as HttpResponse;
/**
 * Registers a new user and returns a auth token
 */
Route::post('/jwt/signup', function () {
    // $credentials = Input::only('email', 'password');
    $credentials = Input::all();

    try {
        $user = User::create($credentials);
    } catch (Exception $e) {
        return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
    }
    $token = JWTAuth::fromUser($user);
    return Response::json(compact('token'));
});
/**
 * Signs in a user using JWT
 */
Route::post('/jwt/signin', function () {
    $credentials = Input::only('email', 'password');
    if (!$token = JWTAuth::attempt($credentials)) {
        return Response::json(false, HttpResponse::HTTP_UNAUTHORIZED);
    }
    return Response::json(compact('token'));
});
/**
 * Fetches a restricted resource from the same domain used for user authentication
 */
Route::get('/jwt/restricted', [
    'before' => 'jwt-auth',
    function () {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        return Response::json([
            'data' => [
                'email' => $user->email,
                'registered_at' => $user->created_at->toDateTimeString()
            ]
        ]);
    }
]);
/**
 * Fetches a restricted resource from API subdomain using CORS
 */
Route::group(['domain' => 'api.jwt.dev', 'prefix' => 'v1'], function () {
    Route::get('/restricted', function () {
        try {
            JWTAuth::parseToken()->toUser();
        } catch (Exception $e) {
            return Response::json(['error' => $e->getMessage()], HttpResponse::HTTP_UNAUTHORIZED);
        }
        return ['data' => 'This has come from a dedicated API subdomain with restricted access.'];
    });
});