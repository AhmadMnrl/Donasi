<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        $profile = User::find($id);
        return view('profile.index',compact('profile'));
    }
    public function updateProfile(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        $profile->update($request->all());
        if(!empty($request->password)){
            $profile->password = Hash::make($request->password);
        }
        $profile->save();

        return redirect("/profile/$id");
    }
}
