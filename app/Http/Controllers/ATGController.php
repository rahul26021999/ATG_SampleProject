<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ATGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {


        $validInputs=request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'pincode'=>'required|max:6|min:6'
        ]);
        User::create($validInputs);
        return view('success');
    }

    
}
