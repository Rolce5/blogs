<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

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
        // $comment = new Comment($validatedData);
    
        // Associate the comment with the post and save it
        // $post->comments()->save($comment);
    
        // session()->flash('success', 'Comment added successfully');
        // Redirect back to the post with a success message
        // return redirect()->back()->with('success', 'Comment added successfully.');

        if($validatedData->fails()){
            return response->json([
                'status' => 422,
                'error' => $validatedData-messages()
            ], 422);
        }else{
            $comment = new Comment($validatedData);
            if($comment){
                return reponse()->json([
                    'status' => 200,
                    'message' => 'Comment created Successfully'
                ],200);
            }else{
                return reponse()->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong'
                ],500);
            }
        }
    }
}
