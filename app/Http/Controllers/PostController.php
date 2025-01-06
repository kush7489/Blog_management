<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // return view('post.index');
        // $posts = Post::where('user_id', auth()->id())->get();
        // return view('post.index', compact('posts'));
    }

    public function create()
    {   
        $posts = Post::where('user_id', auth()->id())->get();
        return view('post.create', compact('posts'));
        // return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(Request $request,$id)
    {
        $post = Post::findorFail($id);
        // dd($post);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);       
        return redirect()->route('dashboard');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard');
    }
}
