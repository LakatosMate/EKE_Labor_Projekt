<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Bejegyzések listázása
    public function index()
    {
        $posts = Post::with('szerző')->get();
        return view('post.index', compact('posts'));
    }

    // Új bejegyzés létrehozása (űrlap megjelenítése)
    public function create()
    {
        $users = User::all();
        return view('post.create', compact('users'));
    }

    // Új bejegyzés tárolása
    public function store(Request $request)
    {
        $request->validate([
            'cím' => 'required|string|max:255',
            'leirás' => 'nullable|string',
            'image_path' => 'nullable|image',
            'szerző_id' => 'required|exists:users,id',
            'is_publikált' => 'required|boolean',
            'dátum' => 'required|date',
        ]);

        $imagePath = $request->file('image_path') ? $request->file('image_path')->store('images', 'public') : null;

        Post::create([
            'cím' => $request->input('cím'),
            'leirás' => $request->input('leirás'),
            'image_path' => $imagePath,
            'szerző_id' => $request->input('szerző_id'),
            'is_publikált' => $request->input('is_publikált'),
            'dátum' => $request->input('dátum'),
        ]);

        return redirect()->route('post.index')->with('success', 'Bejegyzés sikeresen létrehozva.');
    }

    // Bejegyzés szerkesztése (űrlap megjelenítése)
    public function edit(Post $post)
    {
        $users = User::all();
        return view('post.edit', compact('post', 'users'));
    }

    // Bejegyzés frissítése
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'cím' => 'required|string|max:255',
            'leirás' => 'nullable|string',
            'image_path' => 'nullable|image',
            'szerző_id' => 'required|exists:users,id',
            'is_publikált' => 'required|boolean',
            'dátum' => 'required|date',
        ]);

        $imagePath = $request->file('image_path') ? $request->file('image_path')->store('images', 'public') : $post->image_path;

        $post->update([
            'cím' => $request->input('cím'),
            'leirás' => $request->input('leirás'),
            'image_path' => $imagePath,
            'szerző_id' => $request->input('szerző_id'),
            'is_publikált' => $request->input('is_publikált'),
            'dátum' => $request->input('dátum'),
        ]);

        return redirect()->route('post.index')->with('success', 'Bejegyzés sikeresen frissítve.');
    }

    // Bejegyzés törlése
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Bejegyzés sikeresen törölve.');
    }
}
