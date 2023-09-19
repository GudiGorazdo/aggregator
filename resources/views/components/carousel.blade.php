<div class="swiper {{ $className ?? '' }}">
    <div class="swiper-wrapper">
        @foreach ($items as $item)
        <div class="swiper-slide {{ $classNameSlide ?? '' }}">
            <img
                class="{{ $classNameImage ?? '' }}"
                src="{{ $item->name . '/id/' . rand(10, 100) }}/240/240"
                alt="{{ $alt ?? $item->alt || ''}}"
                {{ $imageAttributes ?? '' }}
            />
        </div>
        @endforeach
    </div>

    {{ $navigation ?? '' }}
</div>


