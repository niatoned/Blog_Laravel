<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:jpeg,jpg,png'
        ]);

        $file = $request->file('file');
        Post::query()->create([
            'title' => $title = $request->input('title'),
            'slug' => Str::slug($title),
            'content' => $request->input('content'),
            'is_featured' => $request->input('is_featured') !== null,
            'is_online' => $request->input('is_online') !== null,
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->id(),
            'file' => $file
                ? $file->store('/', 'public')
                : null,
        ]);

        session()->flash('success', "Post successfully created!");

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:jpeg,JPG,png'
        ]);

        $file = $request->file('file');
        $post->update([
            'title' => $title = $request->input('title'),
            'content' => $request->input('content'),
            'is_featured' => $request->input('is_featured') !== null,
            'is_online' => $request->input('is_online') !== null,
            'category_id' => $request->input('category_id'),
            'file' => $file
                ? $file->store('/', 'public')
                : null,
        ]);

        session()->flash('success', "Post successfully updated!");

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', "Post successfully deleted!");

        return redirect()->route('posts.index');

    }
}
