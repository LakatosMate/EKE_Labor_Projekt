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
        $itemsPerPage = $request->query('items', 10);

        if (!in_array($itemsPerPage, [10, 20, 50])) {
            $itemsPerPage = 10;
        }

        $posts = Post::with('author')->paginate($itemsPerPage);

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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image',
            'author_id' => 'required|exists:users,id',
            'is_published' => 'nullable|boolean',
            'date' => 'required|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = 'images/' . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('images'), $imagePath);
        }

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
            'author_id' => $request->input('author_id'),
            'is_published' => $request->input('is_published', false),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('post.index')->with('success', 'Bejegyzés sikeresen létrehozva.');
    }

    // Bejegyzés szerkesztése (űrlap megjelenítése)
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        return view('post.edit', compact('post', 'users'));
    }

    // Bejegyzés frissítése
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image',
            'author_id' => 'required|exists:users,id',
            'is_published' => 'nullable|boolean',
            'date' => 'required|date',
        ]);

        $post = Post::findOrFail($id);

        $imagePath = $post->image_path; // Eredeti kép megőrzése
        if ($request->hasFile('image_path')) {
            $imagePath = 'images/' . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('images'), $imagePath);
        }

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
            'author_id' => $request->input('author_id'),
            'is_published' => $request->input('is_published', false),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('post.index')->with('success', 'Bejegyzés sikeresen frissítve.');
    }

    // Bejegyzés törlése
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image_path && file_exists(public_path($post->image_path))) {
            unlink(public_path($post->image_path));
        }
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Bejegyzés sikeresen törölve.');
    }
}