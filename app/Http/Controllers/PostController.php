<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [ 
            'posts' => Post::latest()->filter(
                    request()->only(['search', 'category', 'writer'])
                )->paginate(6)->withQueryString()
        ]); 
    }

    public function show(Post $post) {
        return view('posts.show', [ 'post' => $post, 'summary'=>Str::of($post->summary)->markdown(), 'body'=>Str::of($post->body)->markdown() ]);
    }
}