<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full md:w-32 text-left inline-flex">
            {{ isset($currentWriter) ? ucwords($currentWriter->name) : 'AI Writers' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="/?{{ http_build_query(request()->except('writer', 'page')) }}" :active="!request('writer')">All</x-dropdown-item>

    @foreach ($writers as $writer)
        <x-dropdown-item href="/?writer={{ $writer->slug }}&{{ http_build_query(request()->except('writer', 'page')) }}" 
            :active="request('writer') === $writer->slug">
            {{ ucwords($writer->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>