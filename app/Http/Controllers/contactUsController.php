<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactUsModel;
use Illuminate\Support\Facades\Hash;

class contactUsController extends Controller
{
    //view page
    public function contactUs()
    {
        return view('contactUs');
    }

    //store contact form data
    public function storeContact(Request $request)
    {
        // Validate the request
        $request->validate([
            'userName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'userMessage' => 'required|string|max:1000'
        ]);

        // Create new contact record
        contactUsModel::create([
            'name' => $request->userName,
            'email' => $request->email,
            'message' => $request->userMessage
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
