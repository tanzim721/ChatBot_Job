<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        // $post = Post::create($request->all());
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
}
