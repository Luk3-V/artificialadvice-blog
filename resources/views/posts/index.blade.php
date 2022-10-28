<x-layout>
    @include('posts._header')

    <main class="max-w-lg md:max-w-6xl mx-auto mt-6 md:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <p class="text-center">Uh Oh. No posts yet!</p>
        @endif
    </main>
</x-layout>