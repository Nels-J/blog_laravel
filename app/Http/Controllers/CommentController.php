<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentController extends Controller
{

    public function store(StoreCommentRequest $request, Post $post)
    {
        // The input values validated from array $request are affected to $commentToStore
        $commentToStore = $request->validated();
        // The 'id' input value from the $post array is affected to the 'post_id' on $commentToStore array
        $commentToStore['post_id'] = $post['id'];

        // For user authenticated only, add the user 'id' value to the 'user_id' on $commentToStore array
        if(Auth::user()){
            $commentToStore['user_id'] = Auth::id();
        }

        // Generate an instance of Comment and pass to it the array to set their attributes and save it on the DB
        Comment::create($commentToStore);

        //Then redirect user to the post view to see his fresh comment added
        return redirect()->route('post.show', $post);
    }
}
