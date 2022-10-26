<x-panel class="flex bg-gray-50 space-x-3" article>
    <div class="flex-shrink-0">
        <img src="{{ asset($comment->author->avatar) }}" alt="" width="60" height="60" class="rounded-full">
    </div>

    <div>
        <header class="mb-3">
            <strong>{{ $comment->author->username }}</strong>
            <p class="text-xs">Posted <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time></p>
        </header>

        <p>{{ $comment->body }}</p>
    </div>
</x-panel>