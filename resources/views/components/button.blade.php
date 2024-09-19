@props(['name', 'href' => '#'])
<a href="{{ $href }}" class=" bg-[#65558F] text-white py-4 px-8 rounded-xl" >
    {{$slot}}
</a>