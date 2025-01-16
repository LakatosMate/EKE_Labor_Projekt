<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {
        if (Auth::check() && (Auth::user()->role === 'szerkesztő' || Auth::user()->role === 'admin' || Auth::user()->role === 'regisztrált')) { 
            $posts = Post::with('author')->orderBy('date', 'asc')->get();
        } else {
            $posts = Post::with('author')->where('is_published', true)->orderBy('date', 'asc')->get();
        }

        return view('main', compact('posts'));
    }
}
