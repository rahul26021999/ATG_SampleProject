<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\registration;

class ATGController extends Controller
{
    use registration;

    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {

        $validator=$this->check($request);
        if ($validator->fails()) {
            return redirect('/')
            ->withErrors($validator)
            ->withInput();
        }
        else{
            $this->submit($request);
            return view('welcome', ['success' => true]);
        }
        
    }
    
}
