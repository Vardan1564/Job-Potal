<?php

namespace App\Http\Controllers;

use App\Models\jobPostModel;
use Illuminate\Http\Request;

class internshipsController extends Controller
{
    public function showInternships()
    {
        $internships = jobPostModel::where('jobtype', 'internship')->paginate(10);
        return view('User.interships', ['internships' => $internships]);
    }
}
