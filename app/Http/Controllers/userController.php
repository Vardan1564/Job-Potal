<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\educationsModel;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class userController extends Controller
{
    
    //edit profile page open 
    public function seekerEditProfile()  {

        $info = Auth::user();
        return view('user.editProfile',compact('info'));
    }

    public function seeker_edit_save(Request $request){


        $request->validate([
         'userNameForm' => 'sometimes|string|max:255',
            'emailForm' => 'sometimes|email',
            'phoneForm' => 'sometimes|string|max:50',
            'userProfileImg' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'comapanyProfileImg' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'education' => 'nullable|string',
            'Skill' => 'nullable|string',
            'Address' => 'nullable|string|max:255',
            'userResume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
    ]);

    $seeker = Auth::user();
    $seeker->name = $request->userNameForm;
    $seeker->email = $request->emailForm;
    $seeker->number = $request->phoneForm;
    $seeker->location = $request->Address;
    $seeker->skill= $request->Skill;
    $seeker->education = $request->education;
    $seeker->work_experience = $request->Experience;

    // profile image (accept both potential field names)
    if ($request->hasFile('userProfileImg') || $request->hasFile('comapanyProfileImg')) 
    {
        $file = $request->file('userProfileImg') ?? $request->file('comapanyProfileImg');
        $profile_photo = time().'.'.$file->extension();
        $file->move(public_path('ProfilePhotos'), $profile_photo);
        $seeker->profile_photo = $profile_photo;
    }

    if ($request->hasFile('userResume'))
    {
        $file = $request->file('userResume');
        $resume_name = time().'.'.$file->extension();  // or use getClientOriginalName() if you want
        $file->move(public_path('resumes'), $resume_name);
        $seeker->resume = $resume_name;  // Save file name or path in DB
    }

    $seeker->save();
 
    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

}
