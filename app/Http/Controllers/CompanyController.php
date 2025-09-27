<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function Cprofile(){
        $user = Auth::user();
        return view('company.CProfile', compact('user'));
    }
    
    public function companyEditProfile()  {

        $info = Auth::user();
        return view('company.CEditProfile',compact('info'));
    }

    // upadate company Data 
    public function edit_save_profile(Request $request)  {
    
         $request->validate([
        'comapanyNameForm' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'comapanyProfileImg' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    // ✅ Get logged-in user
    $company = Auth::user();

    // ✅ Update fields
    $company->name = $request->comapanyNameForm;
    $company->email = $request->email;
    $company->number = $request->phone;
    $company->location = $request->Address;
    $company->description = $request->about;

    // ✅ Handle image only if uploaded
    if ($request->hasFile('comapanyProfileImg')) {
        $file = $request->file('comapanyProfileImg');
        $profile_photo = time().'.'.$file->extension();
        $file->move(public_path('ProfilePhotos'), $profile_photo);
        $company->profile_photo = $profile_photo;
    }

    $company->save();

    return redirect()->route('Cprofile')->with('success', 'Profile updated successfully.');

    }
}
