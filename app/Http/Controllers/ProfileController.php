<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    // Backend user's profile page
    function profile() {
        return view('dashboard.profile.profile');
    }

    // Edit backend user's profile information
    function edit_profile() {
        return view('dashboard.profile.edit-profile');
    }



    // DP UPLOAD
    function profile_picture_upload (Request $request) {
        
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $new_name = Auth::user()->id . "." . $request->file('profile_picture')->getClientOriginalExtension();

        $img = Image::make($request->file('profile_picture'))->resize(300, 300);
        $img->save(public_path('uploads/profile_pictures/' . $new_name), 80);

        // dd($request->all());

        User::find(auth()->id())->update([
            'profile_picture' => $new_name,
        ]);

        return back();
    }
}
