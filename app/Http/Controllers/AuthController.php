<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function detail($id)
    {
       $user = User::find($id);
       return response()->json(["code" => "00", "message" => "success" , "data" => $user]);

    }
    public function postApi(Request $request)
    {
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     $user = Auth::user();
        //     $success['token'] =  $user->createToken('MyApp')-> accessToken;
        //     $success['name'] =  $user->name;
        //     $success['role'] = $user->role;
        //     return response()->json(["code" => "00", "message" => "success" , "data" => $success]);
        // }
        // else{
        //      return response()->json(["code" => "01", "message" => "error"]);
        // }

        $user = User::where('email',$request->email)->first();

        if($user != NULL){
            // var_dump($user);
            $verify = password_verify($request->password, $user->password);
            // var_dump($verify);
            // die;
            if($verify){
                // $success['token'] =  bin2hex(random_bytes(64));
                // $success['id'] = Auth::id();
                $success['name'] =  $user->name;
                $success['role'] = $user->role;
                $success['email'] = $user->email;
                return response()->json(["code" => "00", "message" => "success" , "data" => $success]);
            }else{
                 return response()->json(["code" => "01", "message" => "Email or Password wrong"]);
            }
        }else{
            return response()->json(["code" => "01", "message" => "Username or Password wrong"]);
        }


        // die;

    }
    public function logoutApi()
    {
        Auth::logout();
        return response()->json(["code" => "00", "message" => "succes"]);
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
