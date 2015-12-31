<?php

namespace App\Http\Controllers;

use Response;
use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        return Student::create($request->all());
    }

    public function show($id)
    {
        return Student::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        Student::findOrFail($id)->update($request->all());
        return Response::json($request->all()); //response()->json()
    }

    public function destroy($id)
    {
        return Student::destroy($id);
    }
}
