@php !isset($modifier) ? $modifier = null : null; @endphp

<ul class="categories-list{{ getModifiedClass('categories-list', $modifier) }}">
    @foreach($categories as $category)
    <li class="categories-list__item">
        <a class="categories-list__link" href="#">
            <x-icon-pc-icon class="categories-list__icon" />
            {{ $category->name }}
        </a>
    </li>
    @endforeach
</ul>
