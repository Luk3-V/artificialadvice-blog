<div x-data="{ show: false }" @click.away="show = false">
    <!-- Trigger -->
    <div @click="show = !show" >
        {{ $trigger }}
    </div>
    
    <!-- Dropdown -->
    <div x-show="show" class="py-2 absolute mt-1 bg-gray-100 border border-gray-200 w-full rounded-xl z-50 shadow-md overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>