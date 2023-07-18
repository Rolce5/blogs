<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->paginate(6);
        return response()->json([
            'posts' => $posts,
            'createdAt' => now(),
        ]);
    }

    public function show(Post $post){
        // Load the comments relationship for the post
          $post->load('comments');
          $imageUrl = asset('storage/' . $post->image);


        // Pass the post to a view for display
        return response()->json([
            'post' => $post,
            'imageUrl' => $imageUrl
        ]);
    }
}
