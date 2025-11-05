<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jobPostModel;
use Illuminate\Http\Request;
use App\Models\applyJobModel;

class adminAllOprationController extends Controller
{
    public function dashboard(){
        return view('Admin.adminDashboard');
    }

    public function manageUsers(){
        $user = User::where('role','user')->paginate(10);
        return view('admin.userManage', compact('user'));
    }

    public function manageCompanies(){
        $user = User::where('role','company')->paginate(10);
        return view('admin.companyManage', compact('user'));    
    }

    public function manageJobs(){
        $jobs = jobPostModel::paginate(10);
        return view('admin.jobsManage',compact('jobs'));
    }

    public function analysis(){
        $totalJobs = jobPostModel::count();
        $totalCompanies = User::where('role', 'company')->count();
        $totalUsers = User::where('role', 'user')->count();

        return view('Admin.analysis', compact('totalJobs',  'totalCompanies', 'totalUsers'));
    }

    //aplications management
    public function manageApplications(){
        $applications = applyJobModel::paginate(10);
        return view('admin.jobAplications', compact('applications'));
    }
}
