<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->paginate(6);
        return view('home.index', compact('posts'));
    }

    public function show(Post $post){
        // Load the comments relationship for the post
          $post->load('comments');


        // Pass the post to a view for display
        return view('home.show', compact('post'));
    }
}
