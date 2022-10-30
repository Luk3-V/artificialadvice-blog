<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index() {
        return view('admin.categories.index', [
            'categories' => Category::paginate(20)
        ]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store() {
        $attributes = $this->validateCategory();

        Category::create($attributes);

        return redirect('/admin/categories')->with('success', 'Category created!');
    }

    public function edit($slug) {
        $category = Category::whereSlug($slug)->firstOrFail();
        return view('admin.categories.edit', [ 'category' => $category ]);
    }

    public function update($slug) {
        $category = Category::whereSlug($slug)->firstOrFail();
        $attributes = $this->validateCategory($category);

        $category->update($attributes);

        return redirect('/admin/categories')->with('success', 'Category updated!');
    }

    public function destroy($slug) {
        $category = Category::whereSlug($slug)->firstOrFail();
        $category->delete();

        return back(); 
    }

    protected function validateCategory(Category $category = null) {
        $category ??= new Category();
        return request()->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);
    }
}
