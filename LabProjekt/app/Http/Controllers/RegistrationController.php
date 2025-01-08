<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registration(Request $request)
    {
        try {

            $request->validate([
                'username' => 'required|string|unique:users|max:200',
                'email' => 'required|string',
                'password' => 'required|confirmed|min:8|max:16',
            ],
            [
                'username.unique' => 'Ez a felhasználónév már foglalt. Válasszon egy másikat!',
                'password.min' => 'A jelszónak legalább 8 karakter hosszúnak kell lennie.',
                'password.max' => 'A jelszó nem lehet hosszabb 16 karakternél.',
                'password.confirmed' => 'A jelszavak nem egyeznek meg. Ellenőrizze!'
            ]);

            $new_user = new User;
            $new_user->username = $request->username;
            $new_user->email = $request->email;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('login')->with('success','Felhasználót sikeresen létrehoztuk most már bejelentkezhet.');

        } catch (\Exception $exception) {
            return redirect('register')->with('fail',$exception->getMessage());
        }
        
    }
}
