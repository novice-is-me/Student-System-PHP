@props([
    'name'
])

<label for="{{ $name }}" class="block mb-2 text-xl font-medium text-gray-900">
    {{ $slot }}
</label>
