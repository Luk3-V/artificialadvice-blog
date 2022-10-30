<x-layout>
    <x-admin-layout>
        <main class="w-full bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="mb-6 text-center font-bold text-xl">Create Category</h1>
            
            <form action="/admin/categories" method="post" enctype="multipart/form-data">
                @csrf
    
                <x-form-input name="name"/>
                <x-form-input name="slug"/>
                <x-form-button>PUBLISH</x-form-button>
            </form>
        </main>
    </x-admin-layout>
</x-layout>