<x-layout>
    <x-admin-layout>
        <main class="w-full bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="mb-6 text-center font-bold text-xl">Edit Post</h1>
            
            <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
    
                <x-form-input name="title" :value="old('title', $post->title)"/>
                <x-form-input name="slug" :value="old('slug', $post->slug)"/>
                <x-form-input name="writer_id" type="select" >
                    @foreach ($writers as $writer)
                        <option value="{{ $writer->id }}" {{ old('writer_id') == $writer->id ? 'selected' : ''}}>
                            {{ ucwords($writer->name) }}
                        </option>
                    @endforeach
                </x-form-input>
                <div class="flex justify-between">
                    <x-form-input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" :required="false"/>
                    <img src="{{ asset($post->thumbnail) }}" alt="" class="rounded-xl w-64 mb-6">
                </div>
                <x-form-input name="summary" type="textarea">{{ old('summary', $post->summary) }}</x-form-input>
                <x-form-input name="body" type="textarea">{{ old('body', $post->body) }}</x-form-input>
                <x-form-input name="category_id" type="select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </x-form-input>
                <x-form-button>UPDATE</x-form-button>
            </form>
        </main>
    </x-admin-layout>
</x-layout>