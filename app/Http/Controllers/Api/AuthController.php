<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
     public function register(Request $request )

     {

      //return $request->all();

      $validator = validator()->make($request->all(),[

       'name' =>'required',
       'email'=>'required|unique:users', 
       'password'=>'required|confirmed', 
       
      ]);

       if($validator->fails())
      {
        $data = $validator->errors();
        return responseJson('0',$validator->errors()->first(),$data);

      }

      $request->merge(['password'=>bcrypt($request->password)]);
      $user = User::create($request->all());
      $user->api_token = str_random('60');
      $user->save();
      return responseJson('1','you added successfully',[

       'api_token'=>$user->api_token,
       'user'=>$user

      ]);

    }


    /////////////////////////////////////////////////////////////////

    public function login(Request $request )

    {

      // return $request->all();

      $validator = validator()->make($request->all(),[

       'email'=>'required',
       'password'=>'required', 
       
      ]);

       if($validator->fails())
      {
        $data = $validator->errors();
        return responseJson('0',$validator->errors()->first(),$data);

      }

      $user = User::where('email',$request->email)->first();

      if($user)
      {
       
       if(Hash::check($request->password,$user->password))
       {
        
        return responseJson('1','you are login',[

         'api_token' =>$user->api_token,
         'user' =>$user

        ]);
       }else
       {
        return responseJson('invalid data');
       }
      }else
      {
       return responseJson('0','invalid data');
      }

    }


    /////////////////////////////////////////////////////////////////
}
