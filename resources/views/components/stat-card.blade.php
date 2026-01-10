@props([
    'title',
    'value',
    'icon',
    'trend' => null,
    'trendDirection' => 'up',
    'color' => 'blue',
    'delay' => '0s'
])

@php
    $colorClasses = [
        'blue' => [
            'border' => 'border-blue-500',
            'bg' => 'bg-blue-50',
            'icon-bg' => 'bg-blue-100',
            'icon-text' => 'text-blue-600',
            'trend' => 'text-blue-600'
        ],
        'green' => [
            'border' => 'border-green-500',
            'bg' => 'bg-green-50',
            'icon-bg' => 'bg-green-100',
            'icon-text' => 'text-green-600',
            'trend' => 'text-green-600'
        ],
        'orange' => [
            'border' => 'border-orange-500',
            'bg' => 'bg-orange-50',
            'icon-bg' => 'bg-orange-100',
            'icon-text' => 'text-orange-600',
            'trend' => 'text-orange-600'
        ],
        'purple' => [
            'border' => 'border-purple-500',
            'bg' => 'bg-purple-50',
            'icon-bg' => 'bg-purple-100',
            'icon-text' => 'text-purple-600',
            'trend' => 'text-purple-600'
        ],
        'red' => [
            'border' => 'border-red-500',
            'bg' => 'bg-red-50',
            'icon-bg' => 'bg-red-100',
            'icon-text' => 'text-red-600',
            'trend' => 'text-red-600'
        ],
    ];

    $colors = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div class="stat-card bg-white rounded-2xl shadow-soft hover:shadow-medium p-6 lg:p-8 border-l-4 {{ $colors['border'] }} transition-all duration-300 hover:-translate-y-1 animate-scaleIn"
     style="animation-delay: {{ $delay }};">
    <div class="flex items-start justify-between">
        <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wide">
                {{ $title }}
            </p>
            <p class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2 truncate">
                {{ $value }}
            </p>
            @if($trend)
                <div class="flex items-center space-x-1 text-xs font-medium {{ $colors['trend'] }}">
                    @if($trendDirection === 'up')
                        <i class="fas fa-arrow-up"></i>
                    @elseif($trendDirection === 'down')
                        <i class="fas fa-arrow-down"></i>
                    @else
                        <i class="fas fa-minus"></i>
                    @endif
                    <span>{{ $trend }}</span>
                </div>
            @endif
        </div>
        <div class="flex-shrink-0 w-14 h-14 lg:w-16 lg:h-16 {{ $colors['icon-bg'] }} rounded-xl flex items-center justify-center ml-4">
            <i class="{{ $icon }} {{ $colors['icon-text'] }} text-2xl lg:text-3xl"></i>
        </div>
    </div>
</div>
