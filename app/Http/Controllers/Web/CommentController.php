<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //
    public function store(Request $request, Post $post){
    
        // Validate the request data
        $validatedData = $request->validate([
            'author' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string'
        ]);
    
        // Create a new comment with the validated data
        $comment = new Comment($validatedData);
    
        // Associate the comment with the post and save it
        $post->comments()->save($comment);
    
        session()->flash('success', 'Comment added successfully');
        // Redirect back to the post with a success message
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
