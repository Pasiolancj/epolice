@props(['active'])

@php
    $classes = ($active ?? false)
            ? 'bg-indigo-500'
            : 'block py-2.5 pl-8 px-4 rounded-xl mt-2 text-stone-100  hover:bg-indigo-500 transition duration-150 ease-in-out'
@endphp

<a {{ $attributes->class(['block py-2 mt-2 px-2 rounded-xl'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
