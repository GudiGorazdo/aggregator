<section class="categories categories--{{ $mod }}">
    <h3 class="title text-center">Можно продать</h3>
    <ul class="categories_list">
        @foreach ($prices as $price)
            <li class="categories_item">
                <x-collapse
                    classNameButton="categories_collapse collapsed"
                    target="category_{{ $price['category_id'] }}"
                    controls="category_{{ $price['category_id'] }}"
                >
                    <x-slot name="title">
                        <div class="categories_head">
                            <p class="categories_title">{{ $price['name'] }}</p>
                            @if (!is_null($price['max']))
                                <span class="categories_price">до {{ number_format($price['max'] , 0, '', ' ')}}₽</span>
                            @endif
                        </div>
                    </x-slot>

                    <ul class="categories_sublist">
                        @foreach ($price['data'] as $subCategory)
                            <li class="categories_subitem">
                                <p class="categories_title">{{ $subCategory['name'] }}</p>
                                @if (!is_null($subCategory['price']))
                                    <span class="categories_price">до  {{ number_format($subCategory['price'] , 0, '', ' ')}}₽</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </x-collapse>
            </li>
        @endforeach
    </ul>
</section>
