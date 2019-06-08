<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\User;

trait registration {

	public function check($request)
	{

		$validator = Validator::make($request->all(), [
			'name'=>'required',
			'email'=>'required|email|unique:users',
			'pincode'=>'required|max:6|min:6'

		]);
		return $validator;  	
	}
	public function submit($request)
	{
		//email sending code here 
		Log::info('EMAIL SENT');   
		User::create([
			'name'=> request('name'),
			'email'=>request('email'),
			'pincode'=>request('pincode')
		]);   

	}
}