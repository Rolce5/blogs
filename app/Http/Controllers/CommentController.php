<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request, $postId){
        // Retrieve the post from the database
        $post = Post::findOrFail($postId);
    
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
    
        // Redirect back to the post with a success message
        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }
}
