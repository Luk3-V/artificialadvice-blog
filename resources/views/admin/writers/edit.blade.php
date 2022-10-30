<x-layout>
    <x-admin-layout>
        <main class="w-full bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="mb-6 text-center font-bold text-xl">Edit Writer</h1>
            
            <form action="/admin/writers/{{ $writer->slug }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
    
                <x-form-input name="name" :value="old('name', $writer->name)"/>
                <x-form-input name="slug" :value="old('slug', $writer->slug)"/>
                <x-form-input name="url" :value="old('url', $writer->slug)"/>
                <div class="flex justify-between">
                    <x-form-input name="avatar" type="file" :value="old('avatar', $writer->avatar)" :required="false"/>
                    <img src="{{ asset($writer->avatar) }}" alt="" class="rounded-xl w-32 mb-6">
                </div>
                <x-form-button>UPDATE</x-form-button>
            </form>
        </main>
    </x-admin-layout>
</x-layout>