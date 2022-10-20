@props(['article' => false])

@if ($article)
    <article {{ $attributes(["class"=>"border border-gray-200 p-6 rounded-xl"]) }}>
        {{ $slot }}
    </article>
@else
    <div {{ $attributes(["class"=>"border border-gray-200 p-6 rounded-xl"]) }}>
        {{ $slot }}
    </div>
@endif
