<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        // Find the user with the specified ID
        $user = auth()->user();

        // Get all the posts of the user
        $posts = $user->posts;

        // return view('posts.index', compact('posts'));
        return response()->json([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
        // dd('123');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   
        request()->validate([
            'title'  => 'required',
            'image'  => 'nullable|mimes:jpg,png,svg',
            'body'   => 'required',
        ]);

    

        $user = Auth::user();
        $post = new Post([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        // Upload cover image if present
        if ($request->file('image')) {
            $request->image->storeAs('images', time() . '_' . $request->image->getClientOriginalName(), 'public');
            $post->image = 'images/' . time() . '_' . $request->image->getClientOriginalName();
        } else {
            $post->image = null;
        }
    
        $user->posts()->save($post);

        session()->flash('success', 'Post created successfully');

        // return redirect()->route('posts.index');
        return response()->json([
            'status' => 200,
            'message' => 'post created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findorFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = Auth::user();
        $post = $user->posts()->findOrFail($id);

        request()->validate([
            'title'  => 'required',
            'image'  => 'nullable',
            'body'   => 'required',
         ]);
        
        //Upload cover image if present
        if ($request->hasFile('image')) {
            Storage::delete('/' . $post->image);
            $request->image->storeAs('images', time() . '_' . $request->image->getClientOriginalName(), 'public');
            $post->image = 'images/' . time() . '_' . $request->image->getClientOriginalName();
        } else {
            $post->image = $post->image;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $user->posts()->save($post);
        
        session()->flash('success', 'Post created successfully');
        
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findorFail($id);

        if ($post->image) {
            Storage::delete('/' . $post->image);
        }

        $post->delete();
        session()->flash('success', 'Post deleted successfully');

        return redirect()->route('posts.index');
    }
}
