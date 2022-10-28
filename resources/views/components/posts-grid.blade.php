<x-post-featured-card :post="$posts[0]"/>

@if ($posts->count() > 1)
    <div class="md:grid md:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
        @endforeach
    </div>
@endif