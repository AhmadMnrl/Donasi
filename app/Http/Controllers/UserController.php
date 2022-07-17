<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    public function userIndex() {
        $user = User::all();
        return view('user.index-user',compact('user'));

    }

    public function storeUser(Request $request) {
        $user = new User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/user')->with('message','Data Berhasil Disimpan');
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        return view('user.update-user',compact('user'));
    }

    public function updateUser(Request $request, $id) {

        $user = User::findOrFail($id);
        $user->update($request->all());
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('/user')->with('message3','Data Berhasil Diedit');
    }

    public function DeleteUser($id) {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('message2','Data Berhasil Dihapus');

    }
}
