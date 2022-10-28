<div class="space-x-2">
    <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
        class="px-3 py-1 border border-blue-400 rounded-full text-blue-400 text-xs uppercase font-semibold"
        style="font-size: 10px">{{ $category->name }}</a>
</div>