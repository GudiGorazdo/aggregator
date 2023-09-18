<div class="aside-rating-box">
    <p class="aside-label mb-15">Рейтинг</p>
    <div class="display-rating">
        <p class="display-rating__count">{{ $request[$filter->getName()] ?? 3 }}.0</p>
        <x-star-rating rating="{{ $request[$filter->getName()] ?? 3 }}" />
    </div>
</div>


