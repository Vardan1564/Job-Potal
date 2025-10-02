<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\jobPostModel;

class jobPostController extends Controller
{
    //return Job Post Page 
    public function  jobPost(){
        $company = Auth::user();
        return view('Company.jobpost',compact('company'));
        
    }

    public function jobpost_save(Request $request){

         $validatedData = $request->validate([
            'jobtitle'          => 'required|string|max:255',
            'city'              => 'required|string|max:100',
            'state'             => 'required|string|max:100',
            'jobtype'           => 'required|string|max:50',
            'experience_level'  => 'required|string|max:50',
            'job_description'   => 'required|string',
            'qualifications'    => 'required|string',
            'company_name'      => 'required|string|max:255',
            'job_deadline'      => 'required|date|after_or_equal:today',
            'salary_range'      => 'required|string|max:50',
            'email'             => 'required|email|max:255',
        ]);
        $company = Auth::user();
        $job = new jobPostModel();
        $job->company_id       = $company->id;
        $job->jobtitle         = $request->jobtitle;
        $job->city             = $request->city;
        $job->state            = $request->state;
        $job->jobtype          = $request->jobtype;
        $job->experience_level = $request->experience_level;
        $job->job_description  = $request->job_description;
        $job->qualifications   = $request->qualifications;
        $job->company_name     = $request->company_name;
        $job->job_deadline     = $request->job_deadline;
        $job->salary_range     = $request->salary_range;
        $job->Email            = $request->email;
        $job->active_or_not    = 1; // default active

        $job->save();

        return redirect()->route('company');

    }
}
