<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class signupProcessController extends Controller
{
    // sign-up page 
    public function signup() {
        
        return view('signup');
    }

    // sign-in page

    public function signin(){
        return view('signin');
    }

    // store user data 
    public function storeUser(Request $request) {

        $request->validate([
            'userName'=>'required',
            'userEmail'=>'required|email',
            'userContactNo'=>'required',
            'userPassword'=>'required|min:6'
        ]);

        $user = new User();

        $user->name = $request->userName;
        $user->email =$request->userEmail;
        $user->number =$request->userContactNo;
        $user->password =$request->userPassword;
        $user->role = $request->role;

         $user->save();

        return redirect()->route('signin')->with('success', 'Sign-Up successfully.');
    }

    public function editProfile()
    {
        return view('user.editProfile');
    }

    
}
