<x-accordion className="aside-filters-categories" id="filter_categories">
    <x-accordion-item
        id="filter_categories_inner"
        className="aside-filters-categories_item"
        collapse="coolapse_filter_categories_inner"
        title="Категории"
        show="true"
    >
        @foreach (\App\Models\Category::with('subCategories')->get() as $cat)
            <button class="btn btn-primary"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#subcategory_{{ $cat->id }}"
                aria-expanded="false"
                aria-controls="subcategory_{{ $cat->id }}"
            >
                {{ $cat->name }}
            </button>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="subcategory_{{ $cat->id }}">
                        <div class="card card-body">
                            @foreach ($cat->subCategories as $sc)
                                <x-checkbox
                                    id="sub_category_{{ $sc->id }}"
                                    value="{{ $sc->id }}"
                                    name="sub_categories[]"
                                    line="{{ true }}"
                                    active="{{ isset($requestData['sub_categories']) && in_array($sc->id, $requestData['sub_categories']) }}"
                                >
                                    {{ $sc->name }}
                                </x-checkbox>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </x-accordion-item>
</x-accordion>
