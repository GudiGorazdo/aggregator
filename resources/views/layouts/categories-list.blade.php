<ul class="categories-list{{ isset($classMod) && $classMod ? " categories-list--" . $classMod : ""}}">
    @foreach ($categories as $category)
        <li class="categories-list__item{{ isset($classMod) && $classMod ? " categories-list__item--" . $classMod : ""}}">
            <x-checkbox-square label="{{ $category->name }}" labelPos="back">
                <x-icon-pc-icon fill="transparent"/>
            </x-checkbox-square>
            <button class="btn categories-list__into{{ isset($classMod) && $classMod ? " categories-list__into--" . $classMod : ""}}" data-subcategory-path="{{ $category->id }}">
                <x-icon-chevron-down />
            </button>
            <div class="categories-list__brands{{ isset($classMod) && $classMod ? " categories-list__brands--" . $classMod : ""}}" data-subcategory-target="{{ $category->id }}">
                <div class="categories-list__breadcrumbs">
                    <button class="btn categories-list__back" data-subcategory-close="{{ $category->id }}">
                        {{ $category->name }} ({{ count($category->subCategories) }})
                    </button>
                </div>
                @include('layouts.brands-list', ['brands' => $category->subCategories, 'classMod' => $classMod ?? false])
            </div>
        </li>
    @endforeach
</ul>


