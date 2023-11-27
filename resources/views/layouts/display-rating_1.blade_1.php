<div class="display-rating{{ isset($size) && $size ? " display-rating--$size" : '' }} {{ $className ?? '' }}">
    @if (isset($active) && isset($filter))
        <p class="display-rating__count {{ $classNameCount ?? '' }}">{{ $request[$filter] ?? 3 }}.0</p>
        <x-star-rating id={{ $id ?? false }} rating="{{ $request[$filter] ?? 3 }}" />
    @else
        <p class="display-rating__count {{ $classNameCount ?? '' }}">{{ $rating }}</p>
        @if (isset($size))
            <x-star-rating id={{ $id ?? false }} rating="{{ $rating }}" disabled={{ true }} size="{{ $size }}"/>
        @else
            <x-star-rating id={{ $id ?? false }} rating="{{ $rating }}" disabled={{ true }} />
        @endif

    @endif
</div>


