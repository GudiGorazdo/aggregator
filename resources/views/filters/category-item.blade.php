<li class="accordion__item accordion__item--categories">
    <x-checkbox-square label="{{ $category->name }}" labelPos="back">
        <x-icon-pc-icon fill="transparent"/>
    </x-checkbox-square>
    <button class="accordion__categories__into" data-subcategory-path="{{ $category->id }}">
        <x-icon-chevron-down />
    </button>
    <div class="accordion__body accordion__body--categories" data-subcategory-target="{{ $category->id }}">
        <div class="accordion__body-inner accordion__body-inner--categories">
            <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                    <li>
                        <button class="btn accordion__breadcrumbs-btn" data-subcategory-close="{{ $category->id }}">
                            {{ $category->name }} ({{ count($category->subCategories) }})
                        </button>
                    </li>
                </ul>
                <ul class="brands-list brands-list--categories">
                    @foreach ($category->subCategories as $item)
                    <li class="brands-list__item">
                        <x-checkbox-square label="{{ $item->name }}" labelPos="back" />
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</li>


