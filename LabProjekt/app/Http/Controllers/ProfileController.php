<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile.profile');
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $file = $request->file('profile_picture');
        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('profile_pictures'), $fileName);
        $user->profile_picture = 'profile_pictures/' . $fileName;

        $user->save();

        return back()->with('success', 'Profilkép sikeresen frissítve lett!');
    }
}
