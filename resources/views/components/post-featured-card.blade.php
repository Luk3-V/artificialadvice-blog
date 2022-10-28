@props(['post'])

<x-panel article class="md:flex transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5">
    <a class="basis-1/3 md:mr-8" href="/posts/{{ $post->slug }}">
        <img src="{{ asset($post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
    </a>

    <div class="basis-2/3 flex flex-col justify-between">
        <header class="mt-8 md:mt-0">
            <div class="space-x-2">
                <x-category-button :category="$post->category"/>
            </div>

            <div class="mt-4">
                <a href="/posts/{{ $post->slug }}">
                    <h1 class="text-3xl hover:underline">
                        {{ $post->title }}
                    </h1>
                </a>

                <span class="mt-2 block text-gray-400 text-xs">
                    <time>{{ $post->created_at->format('F j, Y, g:i a') }}</time>
                </span>
            </div>
        </header>

        <div class="text-sm mt-2 space-y-4">
            {!! $post->summary !!}
        </div>

        <footer class="flex justify-between items-center mt-8">
            <div class="flex items-center text-sm">
                <img src="{{'/images/'.$post->writer->avatar}}" alt="avatar" width="50" height="50" class="rounded">
                <div class="ml-3">
                    <a href="/?writer={{ $post->writer->slug }}"><h5 class="font-bold hover:underline">{{ $post->writer->name }}</h5></a>
                    <a href="{{ $post->writer->url }}" class="hover:underline">{{ $post->writer->url }}</a>
                </div>
            </div>

            <div class="hidden md:block">
                <a href="/posts/{{ $post->slug }}"
                class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                >Read More</a>
            </div>
        </footer>
    </div>
</x-panel>