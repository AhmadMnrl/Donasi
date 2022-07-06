<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function postApi(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;
            $success['role'] = $user->role;
            return response()->json(["code" => "00", "message" => "success" , "data" => $success]);
        }
        else{
             return response()->json(["code" => "01", "message" => "error"]);
        }
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
       Auth::attempt($request->only('email','password'));
       return redirect('/');
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        // $password = $request->password;
        // $store = [
        //     'email'=> $request->email,
        //     'password'=> $request->password,
        //     'role'=>'admin'
        // ];


        // User::create($store);

        // return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
