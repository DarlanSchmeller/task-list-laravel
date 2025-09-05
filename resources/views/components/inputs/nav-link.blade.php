@props(['url' => '/', 'active' => false, 'icon' => null])

<a href="{{ $url }}" {{ $attributes }}
    class="text-white hover:underline py-2 {{ $active ? 'text-indigo-100 font-semibold' : '' }}">
    @if($icon)
        <i class="fa fa-{{ $icon }} mr-1" ></i>
        {{ $slot }}
    @else
        {{ $slot }}
    @endif
</a>