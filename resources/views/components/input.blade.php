@props([
    'type',
    'name',
    'placeholder' => '',
])
<input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">