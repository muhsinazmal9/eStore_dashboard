<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Backend user's profile page
    function profile()
    {
        return view('dashboard.profile.profile');
    }

    // Edit backend user's profile information
    function edit_profile()
    {
        return view('dashboard.profile.edit-profile');
    }

    // DP UPLOAD
    function profile_picture_upload(Request $request)
    {

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

    function cover_photo_upload(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $new_name = Auth::user()->id . '.' . $request->file('cover_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('cover_photo'))->resize(1560, 370);
        $img->save(public_path('uploads/cover_photos/' . $new_name), 80);

        User::find(auth()->id())->update([
            'cover_photo' => $new_name,
        ]);
        return back();
    }

    // PASSWORD CHANGE
    function password_change(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required|current_password:web',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
            ],
            [
                'required' => 'Give pass bruh!',
                'old_password.current_password' => 'password to milenai...',
            ]
        );
        User::find(auth()->id())->update([
            'password' => Hash::make($request->password),
        ]);
        return back()->with('msg', 'Password Changed Successfully');
    }
}