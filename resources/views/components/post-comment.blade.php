<x-panel class="flex bg-gray-50 space-x-3" article>
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60" alt="" width="60" height="60" class="rounded-full">
    </div>

    <div>
        <header class="mb-3">
            <strong>{{ $comment->author->name }}</strong>
            <p class="text-xs">Posted <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time></p>
        </header>

        <p>{{ $comment->body }}</p>
    </div>
</x-panel>