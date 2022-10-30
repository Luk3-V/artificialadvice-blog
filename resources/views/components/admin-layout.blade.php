<style>
    li a:hover {
        text-decoration: underline;
    }
</style>

<div class="mt-20 max-w-4xl mx-auto flex">
    <aside class="w-40 flex-shrink-0">
        <h2 class="text-xl font-bold mb-3">Links</h2>

        <ul class="space-y-2">
            <li>
                <a href="/admin/posts">Manage Posts</a>
            </li>
            <li>
                <a href="/admin/posts/create">Create Post</a>
            </li>
            <li>-</li>
            <li>
                <a href="/admin/categories">Manage Categories</a>
            </li>
            <li>
                <a href="/admin/categories/create">Create Category</a>
            </li>
            <li>-</li>
            <li>
                <a href="/admin/writers">Manage Writers</a>
            </li>
            <li>
                <a href="/admin/writers/create">Create Writer</a>
            </li>
        </ul>
    </aside>

    {{ $slot }}
</div>