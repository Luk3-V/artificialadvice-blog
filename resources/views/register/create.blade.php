<x-layout>
    <main class="mt-20 max-w-md mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="mb-6 text-center font-bold text-xl">Register Account</h1>

        <form method="POST" action="/register">
            @csrf
            <x-form-input name="name" />
            <x-form-input name="username" />
            <x-form-input name="email" type="email" />
            <x-form-input name="password" type="password" />
            <button class="bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600"
                type="submit">Register</button>
        </form>
    </main>
</x-layout>   