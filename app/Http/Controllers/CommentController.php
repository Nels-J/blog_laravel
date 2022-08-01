<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        //Generate an instance of Comment from Models into $newComment
        $newComment = new Comment;
        // The form input value related on the $request are affected to the related attributes on $newComment
        $newComment->comment = $request->comment;
        $newComment->pseudo = $request->pseudo;
        $newComment->email = $request->email;
        $newComment->post_id = $post->id;

        //Save method from Model.php manage the insert to the DB
        $newComment->save();

        //Then redirect user to the post view to see his fresh comment added
        return redirect()->route('post.show', $post);
    }
}
