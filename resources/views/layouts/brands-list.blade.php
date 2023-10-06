<ul
    class="brands-list {{ isset($modification) && $modification ? " brands-list--" . $modification : ""}} {{ $classNameUl ?? "" }}"
    {{ $attributes ?? '' }}
    >
    @foreach ($subCategories as $subCategory)
        <li class="brands-list__item{{ isset($modification) && $modification ? " brands-list__item--" . $modification : ""}}">
            <div class="brands-list__icon"></div>
            <div class="brands-list__info">
                <p class="brands-list__brand">{{ $subCategory->name }}</p>
                @if(isset($prices) && isset($categoryID) && isset($prices[$categoryID]['items'][$subCategory->id]))
                    <p class="brands-list__price">от {{ $prices[$categoryID]['items'][$subCategory->id]->price }} руб.</p>
                @endif
           </div>
        </li>
    @endforeach
</ul>


