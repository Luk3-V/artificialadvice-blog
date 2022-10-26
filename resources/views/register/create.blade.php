<x-layout>
    <main class="mt-20 max-w-md mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="mb-6 text-center font-bold text-xl">Register Account</h1>

        <form method="POST" action="/register" enctype="multipart/form-data">
            @csrf
            <x-form-input name="username" />
            <x-form-input name="email" type="email" />
            <x-form-input name="password" type="password" />
            {{-- <x-form-input name="confirm_password" type="password" /> --}}
            <x-form-input name="avatar" type="file" />
            <x-form-button>REGISTER</x-form-button>
        </form>
    </main>
</x-layout>   