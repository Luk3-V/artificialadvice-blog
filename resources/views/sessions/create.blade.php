<x-layout>
    <main class="mt-20 max-w-md mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="mb-6 text-center font-bold text-xl">Sign In</h1>

        <form method="POST" action="/signin">
            @csrf
            <x-form-input name="email" type="email" />
            <x-form-input name="password" type="password" />
            <x-form-button>SIGN IN</x-form-button>
        </form>
    </main>
</x-layout>   