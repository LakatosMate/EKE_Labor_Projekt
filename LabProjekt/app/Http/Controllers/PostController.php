<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Bejegyzések listázása
    public function index(Request $request)
    {
        // Olvassuk ki az 'items' paramétert, alapértelmezés 10
        $itemsPerPage = $request->query('items', 10);

        // Érvényes elemszámok: 10, 20, 50
        if (!in_array($itemsPerPage, [10, 20, 50])) {
            $itemsPerPage = 10;
        }

        // Pagináció az 'items' alapján
        $posts = Post::with('author')->paginate($itemsPerPage);

        return view('post.index', compact('posts'));
    }

    // Új bejegyzés létrehozása (űrlap megjelenítése)
    public function create()
    {
        $users = User::all(); // Minden felhasználó lekérése
        return view('post.create', compact('users'));
    }

    // Új bejegyzés tárolása
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image',
            'author_id' => 'required|exists:users,id',
            'is_published' => 'boolean',
            'date' => 'required|date',
        ]);

        // Kép feltöltése (ha van)
        $imagePath = $request->file('image_path')
            ? $request->file('image_path')->store('images', 'public')
            : null;

        // Bejegyzés létrehozása
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
            'author_id' => $request->input('author_id'),
            'is_published' => $request->input('is_published'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('post.index')->with('success', 'Bejegyzés sikeresen létrehozva.');
    }

    // Bejegyzés szerkesztése (űrlap megjelenítése)
    public function edit(Post $post)
    {
        $users = User::all(); // Felhasználók a szerkesztéshez
        return view('post.edit', compact('post', 'users'));
    }

    // Bejegyzés frissítése
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image',
            'author_id' => 'required|exists:users,id',
            'is_published' => 'required|boolean',
            'date' => 'required|date',
        ]);

        // Kép frissítése (ha van új kép)
        $imagePath = $request->file('image_path')
            ? $request->file('image_path')->store('images', 'public')
            : $post->image_path;

        // Bejegyzés frissítése
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
            'author_id' => $request->input('author_id'),
            'is_published' => $request->input('is_published'),
            'date' => $request->input('date'),
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
