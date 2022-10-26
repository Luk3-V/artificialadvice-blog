<x-layout>
    <x-admin-layout>
        <main class="w-full bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="mb-6 text-center font-bold text-xl">Create Post</h1>
            
            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf
    
                <x-form-input name="title" />
                <x-form-input name="slug" />
                <x-form-input name="writer_id" type="select" >
                    @foreach ($writers as $writer)
                        <option value="{{ $writer->id }}" {{ old('writer_id') == $writer->id ? 'selected' : ''}}>
                            {{ ucwords($writer->name) }}
                        </option>
                    @endforeach
                </x-form-input>
                <x-form-input name="thumbnail" type="file"/>
                <x-form-input name="summary" type="textarea"/>
                <x-form-input name="body" type="textarea"/>
                <x-form-input name="category_id" type="select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </x-form-input>
                <x-form-button>PUBLISH</x-form-button>
            </form>
        </main>
    </x-admin-layout>
</x-layout>