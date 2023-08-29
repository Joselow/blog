<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(){
        $posts = Post::where('status', 2)->latest('id')->paginate(6);
        return view('posts.list', compact('posts'));
    }
    public function show(Post $post){
        $postsRelated = Post::where('idCategory',$post->idCategory)
                            ->where('id', '!=', $post->id )
                            ->where('status', 2)
                            ->latest('id')
                            ->take(5)
                            ->get();
        return view('posts.show', compact('post', 'postsRelated')) ;
    }

    public function getByCategory(Category $category){
        $posts = Post::where('idCategory', $category->id)
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(6);
        return view('posts.list', compact('posts'));
    }
}
