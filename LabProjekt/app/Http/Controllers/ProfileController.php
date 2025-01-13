<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function updatePassword(Request $request)
    {
        // Validáció
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Jelszó frissítése
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Jelszó sikeresen megváltoztatva!');
    }
}
