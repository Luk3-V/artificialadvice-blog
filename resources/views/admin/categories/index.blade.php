<x-layout>
    <x-admin-layout>
        <main class="w-full bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="mb-6 text-center font-bold text-xl">Manage Categories</h1>
            
        
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Name
                            </th>
                            <th scope="col" class="w-10 px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-right text-sm uppercase font-normal">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $category->name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right whitespace-nowrap">
                                    <div class="flex space-x-6">
                                        <a href="/admin/categories/{{ $category->slug }}/edit" class="text-blue-500 hover:text-blue-700 font-bold">
                                            EDIT
                                        </a>
                                        <form action="/admin/categories/{{ $category->slug }}" method="post">
                                            @csrf
                                            @method('DELETE')
    
                                            <button type="submit" class="text-gray-400 hover:text-grey-700 font-bold"
                                                data-dismiss="modal" onclick="return confirm('Are you sure?');">
                                                DELETE
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </main>
    </x-admin-layout>
</x-layout>