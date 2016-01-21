<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrialErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trial.validation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'start_date' => 'required|after:tomorrow',
            'end_date' => 'required|after:start_date',
            'telpon' => 'required|regex:/(\(\d{4}+\)+ \d{3}+\-\d{3}+)/',
            'web' => 'required|url',
            'open' => 'required',
            'close' => 'required|after:open',
            'break_start' => 'required|after:open|before:close',
            // 'title' => 'required|unique:posts|max:255',
            // 'body' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Karakter minimal 3',
            'start_date.after' => 'The Day must be today / tomorrow',
            'end_date.after' => 'The end date must be after start date',
            'telpon.regex' => 'Format telpon tidak valid',
            'web.url' => 'Alamat web tidak valid',
            'close.after' => 'Jam Tidak valid',
            'break_start.after' => 'Jam istirahat harus setelah jam buka',
            'break_start.before' => 'Jam istirahat harus sebelum jam tutup'
        ]);

        if ($validator->fails()) {
            return redirect('trial/validation')
                        ->withErrors($validator)
                        ->withInput();
        }

        echo "form valid !";
    }


}
