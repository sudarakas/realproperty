<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Alert;

class CommentController extends Controller
{
    public function addComment(Request $request){

        $request->validate([
            'comment' => 'required|max:200|min:3',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->article_id = request('article_id');
        $comment->comment = request('comment');
        $comment->save();

        Alert::success('Your comment has been added successfully!', 'Comment Added!')->autoclose(3000);
        return back();
    }
}
