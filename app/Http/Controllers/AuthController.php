<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Donatur;
use Auth;
use Hash;
class AuthController extends Controller
{
    public function detail($id)
    {
       $donatur = Donatur::find($id);
       response()->json(["code" => "00", "message" => "success" , "data" => $donatur]);

    }
     public function submitDonatur(Request $request)
    {
        $donatur = new Donatur;
        $donatur->nama = $request->nama;
        $donatur->no_telp = $request->no_telp;
        $donatur->email = $request->email;
        $donatur->alamat = $request->alamat;
        $donatur->password = Hash::make($request->password);
        $donatur->save();
        return response()->json(["code" => "00", "message" => "success" , "data" => $donatur]);
    }
    public function updateDonatur(Request $request, $id)
    {
        $donatur = donatur::find($id);
        $value = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ];
        $donatur->update($value);
        return response()->json(["code" => "00", "message" => "success" , "data" => $donatur]);
    }
     public function deleteDonatur($id)
    {
        $donatur = Donatur::find($id);
        $donatur->delete();
        return response()->json(["code" => "00", "message" => "success"]);
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

        $donatur = donatur::where('email',$request->email)->first();

        if($donatur != NULL){
            // var_dump($donatur);
            $verify = password_verify($request->password, $donatur->password);
            // var_dump($verify);
            // die;
            if($verify){
                // $success['token'] =  bin2hex(random_bytes(64));
                $success['id'] = $donatur->id;
                $success['nama'] =  $donatur->nama;
                $success['alamat'] = $donatur->alamat;
                $success['email'] = $donatur->email;
                $success['no_telp'] = $donatur->no_telp;
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
