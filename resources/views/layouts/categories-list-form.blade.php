<ul class="categories-list-form{{ isset($modification) && $modification ? " categories-list-form--" . $modification : ""}}">
    @foreach ($categories as $category)
        <li class="categories-list-form__item{{ isset($modification) && $modification ? " categories-list-form__item--" . $modification : ""}}">
            <x-checkbox-square label="{{ $category->name }}" labelPos="back">
                <x-icon-pc-icon fill="transparent"/>
            </x-checkbox-square>
            <button class="btn categories-list-form__into{{ isset($modification) && $modification ? " categories-list-form__into--" . $modification : ""}}" data-subcategory-path="{{ $category->id }}">
                <x-icon-chevron-down />
            </button>
            <div class="categories-list-form__brands{{ isset($modification) && $modification ? " categories-list-form__brands--" . $modification : ""}}" data-subcategory-target="{{ $category->id }}">
                <div class="categories-list-form__breadcrumbs">
                    <button class="btn categories-list-form__back" data-subcategory-close="{{ $category->id }}">
                        {{ $category->name }} ({{ count($category->subCategories) }})
                    </button>
                </div>
                @include('layouts.brands-list-form', ['brands' => $category->subCategories, 'modification' => $modification ?? false])
            </div>
        </li>
    @endforeach
</ul>


