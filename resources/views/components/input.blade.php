@props([
    'type',
    'name',
    'placeholder' => '',
    'model'
])
<input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" wire:model='{{ $model }}' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">