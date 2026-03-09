@props([
    'title' => null,
    'id' => null,
    'padding' => 'mb-16',
])

<section 
    {{ $attributes->merge(['class' => $padding]) }}
    @if($id) id="{{ $id }}" @endif
>
    @if($title)
        <h2 class="text-3xl font-bold mb-4  pb-2">{{ $title }}</h2>
    @endif
    
    {{ $slot }}
</section>