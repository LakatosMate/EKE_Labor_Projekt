<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;

class HomeController extends Controller
{


 public function index()
    {

        $posts = Post::all();
        return view('main', compact('posts'));
    }

}
