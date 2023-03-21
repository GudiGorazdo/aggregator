<section class="categories categories--{{ $mod }}">
    <h3 class="title text-center">Можно продать</h3>
            alskdfjalskdjflaksdjflkasjdf:w
    <ul class="categories_list">
        @foreach ($categories as $category)
            <x-collapse
                classNameButton="filters-subcategories_button"
                target="category_{{ $category['id'] }}"
                controls="category_{{ $category['id']}}"
            >
                <x-slot name="title">{{ $category['name'] }}</x-slot>
                @foreach ($category['sub_categories'] as $item)
                    <x-checkbox
                        :line="true"
                        active="{{ isset($item['active']) ?  true : false }}"
                        id="sub_category_{{ $item['id'] }}"
                        value="{{ $item['id']}}"
                        name="sub_category_{{ $item['id']  }}"
                    >
                        {{ $item['name'] }}
                    </x-checkbox>
                @endforeach
            </x-collapse>
        @endforeach

        @foreach ($prices as $price)
            {{--<li class="categories_item">--}}
                {{--<x-collapse--}}
                    {{--classNameButton="categories_collapse collapsed"--}}
                    {{--target="category_{{ $price['category_id'] }}"--}}
                    {{--controls="category_{{ $price['category_id'] }}"--}}
                {{-->--}}
                    {{--<x-slot name="title">--}}
                        {{--<div class="categories_head">--}}
                            {{--<p class="categories_title">{{ $price['name'] }}</p>--}}
                            {{--@if (!is_null($price['max']))--}}
                                {{--<span class="categories_price">до {{ number_format($price['max'] , 0, '', ' ')}}₽</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</x-slot>--}}

                    {{--<ul class="categories_sublist">--}}
                        {{--@foreach ($price['data'] as $subCategory)--}}
                            {{--<li class="categories_subitem">--}}
                                {{--<p class="categories_title">{{ $subCategory['name'] }}</p>--}}
                                {{--@if (!is_null($subCategory['price']))--}}
                                    {{--<span class="categories_price">до  {{ number_format($subCategory['price'] , 0, '', ' ')}}₽</span>--}}
                                {{--@endif--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</x-collapse>--}}
            {{--</li>--}}
        @endforeach
    </ul>
</section>
