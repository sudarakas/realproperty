<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Alert;

class ArticleController extends Controller
{
    public function newBlogPost(){

        $archives = Article::archive();
        return view('blog.addpost',compact('archives'));

    }
    
    public function addBlogPost(Request $request){

        $request->validate([
            'title' => 'required|max:100|min:3',
            'content' => 'required',
            'category' => 'required'
        ]);

        $article = new Article();
        $article->admin_id = auth()->user()->id;
        $article->title = request('title');
        $article->content = request('content');
        $article->category = request('category');
        $article->save();

        Alert::success('New article has been added successfully!', 'New Article Added!')->autoclose(3000);
        return redirect('/blog');
    }

    public function showEditBlogPost(Article $article){

        $archives = Article::archive();
        return view('blog.editarticle',compact('article','archives'));
    }

    public function editBlogPost(Request $request){

        $request->validate([
            'title' => 'required|max:100|min:3',
            'content' => 'required',
            'category' => 'required'
        ]);

        $article = Article::find(request('id'));
        $article->title = request('title');
        $article->content = request('content');
        $article->category = request('category');
        $article->update();

        Alert::success('Article has been updated successfully!', 'Update Successfully!')->autoclose(3000);
        return redirect('/blog');
    }
}
