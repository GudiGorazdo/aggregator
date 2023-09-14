<div class="filter__aside-rating-box">
    <p class="filter__aside-label mb-15">Рейтинг</p>
    <div class="filter__top-rating">
        <p class="filter__top-num">{{ $request[$filter->getName()] ?? 3 }}.0</p>
        <x-star-rating rating="{{ $request[$filter->getName()] ?? 3 }}" />
    </div>
</div>


