<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\jobPostModel;
class authController extends Controller
{
    public function loginProcess(Request $req)
    {
        $email=$req->email ;
        $password=$req->password;

    

        if(Auth::attempt(['email'=>$email , 'password'=>$password]))
        {
            
            if(Auth::user()->role=='admin')
            {
                return redirect('admin');
            }
            elseif(Auth::user()->role=='user')
            {
                return redirect('user');
            }
            elseif(Auth::user()->role=='company')
            {
                return redirect('company');
            }
        }
        else
        {
            return redirect('signin')->with('error',"User dose not exist....");
        }
    }

    public function profile()
    {
        $user = Auth::user();

        if ($user->role == 'user')
        {
            return view('profile',compact('user'));
        }
        else if ($user->role == 'company')
        {
            return view('Company.CProfile',compact('user'));
        }
        else if($user->role == 'admin')
        {
            return view('Admin.AProfile',compact('user'));
        }
        else{
            abort(403,'Unauthorized action.');
        }
    }
}
