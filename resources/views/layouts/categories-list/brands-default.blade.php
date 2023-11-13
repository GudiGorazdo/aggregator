@php !isset($modifier) ? $modifier = null : null; @endphp

<ul class="categories-list{{ getModifiedClass('categories-list', [$modifier, 'grid']) }}" {{ $attributes ?? '' }}>
    @foreach ($subCategories as $subCategory)
        <li class="categories-list__item{{ getModifiedClass('categories-list__item', [$modifier, 'grid']) }}"
            {{ isset($itemAttributes) ? $itemAttributes($subCategory->id) : '' }}>
            <div class="categories-list__icon{{ getModifiedClass('categories-list__icon', [$modifier, 'grid']) }}"></div>
            <div class="categories-list__info{{ getModifiedClass('categories-list__info', [$modifier, 'grid']) }}">
                <p class="categories-list__brand{{ getModifiedClass('categories-list__brand', [$modifier, 'grid']) }}">
                    {{ $subCategory->name }}</p>
                @if (isset($prices) && isset($categoryID) && isset($prices[$categoryID]['items'][$subCategory->id]))
                    <p class="categories-list__price{{ getModifiedClass('categories-list__price', [$modifier, 'grid']) }}">от
                        {{ $prices[$categoryID]['items'][$subCategory->id]->price }} руб.
                    </p>
                @endif
            </div>
        </li>
    @endforeach
</ul>
