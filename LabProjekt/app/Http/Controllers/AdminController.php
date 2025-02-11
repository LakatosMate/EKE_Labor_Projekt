<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->check()) {
            return view('login');
        }
        if (!(auth::user()->role === 'admin')) { 
            abort(403, 'Nincs jogosultságod az oldal megtekintéséhez.');
        }

        $perPage = $request->input('perPage', 10);

        $users = User::paginate($perPage);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        if (!(auth::user()->role === 'admin')) { 
            abort(403, 'Nincs jogosultságod az oldal megtekintéséhez.');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        
        return redirect()->route('admin.users.index')->with('success', 'Felhasználó frissítve.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Felhasználó törölve.');
    }
}
