<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applyJobModel;
use App\Models\jobPostModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class applyJobController extends Controller
{
    //apply job
    public function apply($c_id, $j_id,$company_name, $job_title, $city, $state)
    {
        
        $user = Auth::user();

        // Check if user has email and resume
        if (empty($user->email) || empty($user->resume)) {
            return redirect()->back()->with('error', 'Please make your profile first || atleast add resume.');
        }
        
        // Check if the user has already applied for this job
        $existing = applyJobModel::where('C_ID', $j_id)
            ->where('J_ID', $c_id)
            ->where('U_ID', $user->id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }


        // Create a new application record
        $application = new applyJobModel();
        $application->C_ID = $j_id;
        $application->J_ID = $c_id;
        $application->U_ID = $user->id;
        $application->user_name = $user->name;
        $application->user_email = $user->email;
        $application->company_name = $company_name;
        $application->job_title = $job_title;
        $application->city = $city;
        $application->state = $state;
        $application->resume = $user->resume;
        $application->status = 'Pending';

        // Save the application to the database
        $application->save();

        return redirect()->back()->with('success', 'Job application submitted successfully!');
    }

    public function applicationsList()
    {
        $user = Auth::user();
        $applications = applyJobModel::where('U_ID', $user->id)->get();  
        return view('user.jobApplication', compact('applications'));
        
    }

    //applicatns's profile
    public function applicantProfile($id)
    {
        $user = User::where('id', $id)->first();
        return view('company.applicantsProfile', compact('user'));
    }


}
