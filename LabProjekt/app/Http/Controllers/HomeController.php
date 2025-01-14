<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;

class HomeController extends Controller
{


 public function index()
    {

        $posts = Post::with('author')->where('is_published', true)->orderBy('date', 'asc')->get();
        return view('main', compact('posts'));
    }
    public function dashboard()
{
    $draftPosts = Post::with('author')->where('is_published', false)->paginate(10);
    return view('dashboard', compact('draftPosts'));
}
}
