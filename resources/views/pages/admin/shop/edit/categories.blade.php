<section class="categories categories--{{ $mod }}">
    <h3 class="title text-center">Можно продать</h3>
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
                        name="sub_category[]"
                    >
                        {{ $item['name'] }}
                    </x-checkbox>
                @endforeach
            </x-collapse>
        @endforeach
    </ul>
</section>
