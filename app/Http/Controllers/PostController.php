<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('user')->get();
        return Inertia::render('posts/Index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($post){
            $post->user()->sync([
                auth()->id()
            ]);
        }
        
        return redirect(route('posts.index'));
    }
   
    public function edit(Post $post)
    {
        return Inertia::render('posts/Edit',
            ['edit_post' => $post]
        );
    }

   
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $data = $request->only(['title', 'description']);
        $post->fill($data);
        $post->save();

        return redirect(route('posts.index'));

    }

   
    public function destroy(Post $post)
    {
        $post->user()->sync([]);
        $post->delete();
        return redirect(route('posts.index'));
    }
}
