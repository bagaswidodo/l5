<?php

namespace App\Http\Controllers;

use App\Catatan;
use JWTAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
   public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $todos = Catatan::where('owner_id', $user->id) ->get();

        return $todos;
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $newTodo = $request->all();
        $newTodo['owner_id']=$user->id;
        return Catatan::create($newTodo);
    }

    public function update(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $todo = Catatan::where('owner_id', $user->id)->where('id',$id)->first();

        if($todo){
            $todo->is_done=$request->input('is_done');
            $todo->save();
            return $todo;
        }else{
            return response('Unauthoraized',401);
        }
    }

    public function destroy($id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $todo = Catatan::where('owner_id', $user->id)->where('id',$id)->first();

        if($todo){
             Catatan::destroy($todo->id);
            return  response('Success',200);;
        }else{
            return response('Unauthoraized',403);
        }
    }
}
