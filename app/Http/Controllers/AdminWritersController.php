<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;

class AdminWritersController extends Controller
{
    public function index() {
        return view('admin.writers.index', [
            'writers' => Writer::paginate(20)
        ]);
    }

    public function create() {
        return view('admin.writers.create');
    }

    public function store() {
        $attributes = $this->validateWriter();
        $attributes['avatar'] = request()->file('avatar')->store('writer_avatars');
        
        Writer::create($attributes);

        return redirect('/admin/writers')->with('success', 'Writer created!');
    }

    public function edit($slug) {
        $writer = Writer::whereSlug($slug)->firstOrFail();
        return view('admin.writers.edit', [ 'writer' => $writer ]);
    }

    public function update($slug) {
        $writer = Writer::whereSlug($slug)->firstOrFail();
        $attributes = $this->validateWriter($writer);

        if($attributes['avatar'] ?? false) {
            $attributes['avatar'] = request()->file('avatar')->store('writer_avatars');
        }

        $writer->update($attributes);

        return redirect('/admin/writers')->with('success', 'Writer updated!');
    }

    public function destroy($slug) {
        $writer = Writer::whereSlug($slug)->firstOrFail();
        $writer->delete();

        return back(); 
    }

    protected function validateWriter(Writer $writer = null) {
        $writer ??= new Writer();
        return request()->validate([
            'name'=>'required',
            'slug'=>'required',
            'url'=>'required',
            'avatar'=> $writer->exists ? 'image' : 'required|image'
        ]);
    }
}
