<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\registration;

class WebServicesController extends Controller
{

	use registration;
	public function store(Request $request)
	{

		$validator=$this->check($request);
		if ($validator->fails()) {
			return response()->json(["errors"=>$validator->errors(),"status"=>"fail|0"],422);	
		}
		else{
			$this->submit($request);
			return response()->json(["status"=>"ok|1"],200);
		}
	}
}
