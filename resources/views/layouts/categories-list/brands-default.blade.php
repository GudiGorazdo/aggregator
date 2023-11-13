@php !isset($modifier) ? $modifier = null : null; @endphp

<ul class="categories-list{{ getModifiedClass('categories-list', [$modifier, 'grid']) }}" {{ $attributes ?? '' }}>
    @foreach ($subCategories as $subCategory)
        <li class="categories-list__item"
            {{ isset($itemAttributes) ? $itemAttributes($subCategory->id) : '' }}>
            <div class="categories-list__icon"></div>
            <div class="categories-list__info">
                <p class="categories-list__brand">
                    {{ $subCategory->name }}</p>
                @if (isset($prices) && isset($categoryID) && isset($prices[$categoryID]['items'][$subCategory->id]))
                    <p class="categories-list__price">от
                        {{ $prices[$categoryID]['items'][$subCategory->id]->price }} руб.
                    </p>
                @endif
            </div>
        </li>
    @endforeach
</ul>
