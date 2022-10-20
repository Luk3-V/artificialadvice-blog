<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(20)
        ]);
    }

    public function create() {
        return view('admin.posts.create', [ 'categories' => Category::all() ]);
    }

    public function store() {
        $attributes = $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', [ 'post' => $post, 'categories' => Category::all() ]);
    }

    public function update(Post $post) {
        $attributes = $this->validatePost($post);

        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post) {
        $post->delete();

        return back(); 
    }

    protected function validatePost(Post $post = null) {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts')->ignore($post->id)],
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'summary' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
    }
}
