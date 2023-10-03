<div class="display-rating {{ $className ?? '' }}">
    @if (isset($active) && isset($filter))
        <p class="display-rating__count {{ $classNameCount ?? '' }}">{{ $request[$filter] ?? 3 }}.0</p>
        <x-star-rating rating="{{ $request[$filter] ?? 3 }}" />
    @else
        <p class="display-rating__count {{ $classNameCount ?? '' }}">{{ $rating }}</p>
        @if (isset($size))
            <x-star-rating rating="{{ $rating }}" disabled={{ true }} />
        @else
            <x-star-rating rating="{{ $rating }}" disabled={{ true }} />
        @endif

    @endif
</div>


