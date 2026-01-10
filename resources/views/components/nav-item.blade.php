@props(['active' => false])

@php
    $classes = $active
        ? 'nav-item active bg-blue-50/80 text-blue-700 border-l-4 border-blue-600'
        : 'nav-item text-gray-700 hover:bg-gray-50 border-l-4 border-transparent hover:border-gray-300';
@endphp

<a {{ $attributes->merge(['class' => "flex items-center px-4 py-3.5 text-sm font-medium rounded-xl transition-all duration-200 group $classes"]) }}>
    <span class="nav-icon flex-shrink-0 text-lg {{ $active ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}">
        {{ $icon ?? '' }}
    </span>
    <span class="nav-text ml-3 font-semibold truncate">
        {{ $slot }}
    </span>
    <span class="tooltip-text">{{ $slot }}</span>
</a>
