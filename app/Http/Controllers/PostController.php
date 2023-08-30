<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

        $classification = [
            'name'=> 'Categoría',
            'content'=> $category->name
        ];
           
        return view('posts.list', compact('posts', 'classification'));
    }
    
    public function getByTag(Tag $tag){
        // $posts =  Post::with('tags');
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->paginate(6);
        
        $classification = [
            'name'=> 'Etiqueta',
            'content'=> $tag->name
        ];
        // $posts = $tag->posts()->where('status', 2)
        //             ->latest()
        //             ->paginate(6);
        return view('posts.list', compact('posts', 'classification'));
    }
}
