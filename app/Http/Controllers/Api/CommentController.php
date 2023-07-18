<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //
    public function store(Request $request, Post $post){

        // Validate the request data
        $validatedData = Validator::make($request->all(), [
            'author' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string'
        ]);

        if($validatedData->fails()){
            return response()->json([
                'status' => 422,
                'error' => $validatedData->messages()
            ], 422);
        }else{
            // Create a new comment with the validated data
            $comment = $post->comments()->create([
                'author' => $request->author,
                'email' => $request->email,
                'comment' => $request->comment
            ]);
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
