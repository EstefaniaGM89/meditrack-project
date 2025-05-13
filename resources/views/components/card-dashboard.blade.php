@props([
    'title',
    'icon' => '',
    'color' => 'indigo',
    'count' => null,
    'link' => null,
    'text' => null,
])

@php
    $bg = "bg-{$color}-50";
    $border = "border-{$color}-100";
    $text = "text-{$color}-800";
    $badge = "bg-{$color}-200 text-{$color}-800";
    $hover = "hover:bg-{$color}-100";
    $linkColor = "text-{$color}-600";
@endphp

<div {{ $attributes->merge([
    'class' => "p-6 rounded-2xl shadow-md border $border $bg hover:shadow-lg transition hover:scale-[1.02] duration-300"
]) }}>
    <div class="flex items-center justify-between mb-2">
        <h3 class="text-lg font-semibold {{ $text }}">{{ $icon }} {{ $title }}</h3>
        @if($count !== null)
            <span class="px-2 py-1 rounded-full text-sm {{ $badge }}">{{ $count }}</span>
        @endif
    </div>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @elseif($text)
        <p class="text-gray-700 dark:text-gray-300">{{ $text }}</p>
    @endif

    @if($link)
        <a href="{{ $link }}" class="{{ $linkColor }} hover:underline mt-4 inline-block">Veure més</a>
    @endif
</div>
