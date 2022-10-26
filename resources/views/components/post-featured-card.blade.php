@props(['post'])

<x-panel article class="lg:flex transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5">
    <div class="flex-1 lg:mr-8">
        <img src="{{ asset($post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
    </div>

    <div class="flex-1 flex flex-col justify-between">
        <header class="mt-8 lg:mt-0">
            <div class="space-x-2">
                <x-category-button :category="$post->category"/>
            </div>

            <div class="mt-4">
                <a href="/posts/{{ $post->slug }}">
                    <h1 class="text-3xl">
                        {{ $post->title }}
                    </h1>
                </a>

                <span class="mt-2 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </span>
            </div>
        </header>

        <div class="text-sm mt-2 space-y-4">
            {!! $post->summary !!}
        </div>

        <footer class="flex justify-between items-center mt-8">
            <div class="flex items-center text-sm">
                <img src="{{ asset($post->writer->avatar) }}" alt="avatar" width="50" height="50" class="rounded">
                <div class="ml-3">
                    <a href="/?writer={{ $post->writer->slug }}"><h5 class="font-bold">{{ $post->writer->name }}</h5></a>
                    <a href="{{ $post->writer->url }}">{{ $post->writer->url }}</a>
                </div>
            </div>

            <div class="hidden lg:block">
                <a href="/posts/{{ $post->slug }}"
                class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                >Read More</a>
            </div>
        </footer>
    </div>
</x-panel>