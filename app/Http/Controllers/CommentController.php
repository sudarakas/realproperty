<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','auth:admin']);
    }

    public function addComment(Request $request){

        if(Auth::guard()->check() || Auth::guard('admin')->check()){
            $request->validate([
                'comment' => 'required|max:200|min:3',
            ]);
    
            $comment = new Comment();
            if(Auth::guard('admin')->check()){
                $comment->user_id = 0;
            }else{
                $comment->user_id = auth()->user()->id;
            }
            $comment->article_id = request('article_id');
            $comment->comment = request('comment');
            $comment->save();
    
            Alert::success('Your comment has been added successfully!', 'Comment Added!')->autoclose(3000);
            return back();
        }else{
            return redirect('/login');
        }

        
    }

    public function deleteComment(Comment $comment){
        DB::table('comments')->where('id', '=', $comment->id)->delete();
        Alert::success('Comment has been deleted successfully!', 'Comment Deleted!')->autoclose(3000);
        return back();
    }
}
