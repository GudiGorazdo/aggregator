<x-accordion className="aside-filters-categories" id="filter_categories">
    <x-accordion-item
        id="filter_categories_inner"
        className="aside-filters-categories_item"
        bodyClassName="aside-filters-categories_body"
        collapse="collapse_filter_categories_inner"
        title="Категории"
        show="true"

    >
        @foreach (\App\Models\Category::with('subCategories')->get() as $category)
            <button class="aside-filters-subcategories_button"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#{{ $filter->getName() }}_{{ $category->id }}_collapse"
                aria-expanded="false"
                aria-controls="{{ $filter->getName() }}_{{ $category->id }}_collapse"
            >
                {{ $category->name }}
            </button>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="{{ $filter->getName() }}_{{ $category->id }}_collapse">
                        <div class="card card-body">
                            @foreach ($category->subCategories as $item)
                                <x-checkbox-item
                                    :item="$item"
                                    :filter="$filter->getName()"
                                    :request="$request"
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </x-accordion-item>
</x-accordion>
