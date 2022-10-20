@props(['name', 'type' => 'text', 'noLabel' => false, 'required' => true])

<div class="mb-6">
    @if (!$noLabel)
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="{{ $name }}">{{ $name }}:</label>
    @endif

    @if ($type === 'textarea')
        <textarea class="text-sm border border-gray-400 p-2 w-full rounded-md"
            name="{{ $name }}" id="{{ $name }}" rows="5" {{ $required ? 'required' : '' }}>{{ $slot ? $slot : old($name) }}</textarea>
    @elseif ($type === 'select')
        <select name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}>
            {{ $slot }}
        </select>
    @else
        <input class="text-sm border border-gray-400 p-2 w-full rounded-md" type="{{ $type }}"
            name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}
            {{ $attributes(['value' => ($type!=='password' ? old($name) : '')]) }}>
    @endif

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
