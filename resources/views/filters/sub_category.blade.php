<x-accordion className="filters-categories" id="filter_categories">
    <x-accordion-item
        id="filter_categories_inner"
        className="filters-categories_item"
        bodyClassName="filters-categories_body"
        collapse="collapse_filter_categories_inner"
        title="Категории"
        show="true"

    >
        @foreach (\App\Models\Category::with('subCategories')->get() as $category)
            <x-collapse
                classNameButton="filters-subcategories_button"
                target="{{ $filter->getName() }}_{{ $category->id }}"
                controls="{{ $filter->getName() }}_{{ $category->id }}"
            >
                <x-slot name="title">{{ $category->name }}</x-slot>
                @foreach ($category->subCategories as $item)
                    <x-checkbox-item
                        :item="$item"
                        :filter="$filter->getName()"
                        :request="$request"
                    />
                @endforeach
            </x-collapse>
        @endforeach
    </x-accordion-item>
</x-accordion>
