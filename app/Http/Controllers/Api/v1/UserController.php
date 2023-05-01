<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

   
    
    public function login(Request $request){

        $valid = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($request->all());

        if($valid->fails()){
            return response(['data'=> $valid->errors()->all() , 'status'=>403],403);
        }

        if(! Auth()->validate(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return response(['data'=> 'UNauthorize' , 'status'=>401],401);
        }

        $user = User::whereEmail($request->email)->first();

        $user->update([
            'api_token' => Str::random(60),
        ]);

        return response(['data'=> $user->api_token , 'status'=>200],200);


    }


}
