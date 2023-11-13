@php !isset($modifier) ? $modifier = null : null; @endphp

<ul class="categories-list{{ getModifiedClass('categories-list', $modifier) }}">
    @foreach($categories as $category)
    <li class="categories-list__item{{ getModifiedClass('categories-list__item', $modifier) }}">
        <a class="categories-list__link{{ getModifiedClass('categories-list__link', $modifier) }}" href="#">
            <x-icon-pc-icon class="categories-list__icon{{ getModifiedClass('categories-list__icon', $modifier) }}" />
            {{ $category->name }}
        </a>
    </li>
    @endforeach
</ul>
