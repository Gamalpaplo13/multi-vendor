<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\AccountCreatedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManageUserController extends Controller
{
    function index()
    {
        return view('admin.manage-user.index');
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => ['required','max:100'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
            'role' => ['required'],
        ]);

        $user = new User();

        if($request->role === 'user'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'user';
            $user->status = 'active';
            $user->save();

            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));

            toastr('created successfully','success','success');
            return redirect()->back();
        }else if($request->role === 'admin'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'admin';
            $user->status = 'active';
            $user->save();

            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));

            toastr('created successfully','success','success');
            return redirect()->back();
        }


    }
}
