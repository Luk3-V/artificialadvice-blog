<x-layout>
    <x-admin-layout>
        <main class="w-full bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="mb-6 text-center font-bold text-xl">Edit Category</h1>
            
            <form action="/admin/categories/{{ $category->slug }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
    
                <x-form-input name="name" :value="old('name', $category->name)"/>
                <x-form-input name="slug" :value="old('slug', $category->slug)"/>
                <x-form-button>UPDATE</x-form-button>
            </form>
        </main>
    </x-admin-layout>
</x-layout>