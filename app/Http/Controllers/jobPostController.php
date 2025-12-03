<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\applyJobModel;
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

       $request->validate([
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
        $job->profile_photo    = $company->profile_photo; // company profile photo
        $job->save();

        return redirect()->route('company');

    }

    // list job posts for seeker
    public function list_jobs(){
        $jobs = jobPostModel::where('active_or_not', '1')->latest()->get();
        return view('User.job-listings', compact('jobs'));
    }

    // list job posts for loged-in company
    public function company_jobs(){
        $company = Auth::user();
        $jobs = jobPostModel::where('company_id', $company->id)->latest()->get();
        return view('Company.your-jobs', compact('jobs'));
    }

    // list job posts for company page
    public function list_jobs_for_company_page(){
        $jobs = jobPostModel::where('active_or_not', 1)->latest()->get();
        return view('company.all-company-jobs', compact('jobs'));
    }

    // job detail page using id
    public function job_detail($id){
        $job = jobPostModel::where('id', $id)->first();
        return view('User.jobDetail', compact('job'));
    }

    // see your post's applicants applications
    public function viewApplicants($id){
            $applications = applyJobModel::where('J_ID', $id)->latest()->get();
            return view('company.applicants', compact('applications'));
    }

    //active or Deactivate job post
    public function activeDeactivate($id){
        $jobs = jobPostModel::where('id', $id)->first();
        
        if($jobs->active_or_not == '1')
        {
            $jobs->active_or_not = '0';
        }
        else{
            $jobs->active_or_not= '1';
        }

        $jobs->save();
        return back();
    }    
}
