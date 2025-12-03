<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jobPostModel;
class searchOprationController extends Controller
{
    //
    public function searchJobList(Request $request){

        $request->validate(
            [
                'searchJobTitle'=>'required',
            ]);
            
        $jobTitle = $request->input('searchJobTitle');
        

        // Build query
        $jobs = jobPostModel::where('jobtitle', 'LIKE', "%{$jobTitle}%")->get();

        // return results
        return view('user.job-listings', compact('jobs'));
    }
}
