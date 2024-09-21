<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
class ProfileController extends Controller
{
    function index()
    {
        return view('admin.profile.index');
    }
    function updateProfile(Request $request)
    {
        $request->validate([
            'name'=>['required', 'max:100'],
            'email'=>['required','email','unique:users,email,'.Auth::user()->id],
            'image'=>['image','max:2048']
        ]);
        $user = Auth::user();

        if($request->hasFile('image')){
            if(File::exists(public_path($user->image)))//check if file is exists
            {
                File::delete(public_path($user->image));
            }

            $image =$request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'),$imageName);

            $path = "/uploads/".$imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile updated Successfully!');
        return redirect()->back();
    }

    function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'=>['required','current_password'],
            'password'=> ['required','confirmed','min:8'],
        ]);

        $request->user()->update([
            'password'=> bcrypt($request->password)
        ]);

        toastr()->success('Password updated Successfully!');
        return redirect()->back();
    }
}
