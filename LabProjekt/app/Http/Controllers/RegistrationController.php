<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registration(Request $request)
    {
        try {
            // Logika építése
            echo 'Regisztráció indítása...';

            return redirect('login')->with('success','Felhasználót sikeresen létrehoztuk most már bejelentkezhet.');;
        } catch (\Exception $exception) {
            return redirect('/')->with('fail',$exception->getMessage());
        }
        
    }
}
