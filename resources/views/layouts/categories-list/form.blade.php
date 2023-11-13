@php !isset($modifier) ? $modifier = null : null; @endphp

<ul
    class="categories-list{{ getModifiedClass('categories-list', [$modifier, 'form']) }}">
    @foreach ($categories as $category)
        <li
            class="categories-list__item">
            <x-checkbox-square label="{{ $category->name }}" labelPos="back">
                <x-icon-pc-icon fill="transparent" />
            </x-checkbox-square>
            <button
                class="btn categories-list__into"
                data-subcategory-path="{{ $category->id }}">
                <x-icon-chevron-down />
            </button>
            <div class="categories-list__brands"
                data-subcategory-target="{{ $category->id }}">
                <div class="categories-list__breadcrumbs">
                    <button class="btn categories-list__back"
                        data-subcategory-close="{{ $category->id }}">
                        {{ $category->name }} ({{ count($category->subCategories) }})
                    </button>
                </div>
                @include('layouts.categories-list.brands-form', [
                    'brands' => $category->subCategories,
                    'modifier' => $modifier,
                ])
            </div>
        </li>
    @endforeach
</ul>
