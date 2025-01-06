<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class DashboardController extends Controller
{
    public function index()
    {
        // Fetching all posts for the logged-in user
        $posts = Post::where('user_id', auth()->id())->get();

        return view('Blog.dashboard', compact('posts'));
    }
}
