@props(['name'])

@error($name)
    <span class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</span>
@enderror
