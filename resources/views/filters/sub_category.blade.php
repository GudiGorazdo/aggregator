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
                data-bs-target="#{{ $filter->getName() }}_{{ $cat->id }}_collapse"
                aria-expanded="false"
                aria-controls="{{ $filter->getName() }}_{{ $cat->id }}_collapse"
            >
                {{ $cat->name }}
            </button>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="{{ $filter->getName() }}_{{ $cat->id }}_collapse">
                        <div class="card card-body">
                            @foreach ($cat->subCategories as $sc)
                                <x-checkbox
                                    id="{{ $filter->getName() }}_{{ $sc->id }}"
                                    value="{{ $sc->id }}"
                                    name="{{ $filter->getName() }}[]"
                                    line="{{ true }}"
                                    active="{{ isset($request[$filter->getName()]) && in_array($sc->id, $request[$filter->getName()]) }}"
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
