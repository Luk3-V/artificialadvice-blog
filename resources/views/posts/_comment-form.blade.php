@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf

            <header class="flex items-center space-x-3 mb-6">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="" width="40" height="40" class="rounded-full">
            
                <span>Write a comment . . .</span>
            </header>

            <x-form-input type="textarea" name="body" noLabel />

            <div class="flex justify-end">
                <x-form-button>POST COMMENT</x-form-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/signin" class="text-blue-500 hover:underline">Sign In</a> to post a comment.
    </p>
@endauth