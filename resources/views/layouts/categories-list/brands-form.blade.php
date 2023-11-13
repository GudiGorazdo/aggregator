@php !isset($modifier) ? $modifier = null : null; @endphp

<ul class="categories-list{{ getModifiedClass('categories-list', [$modifier, 'brand']) }}">
    @foreach ($brands as $brand)
    <li class="categories-list__item{{ getModifiedClass('categories-list__item', [$modifier, 'brand']) }}">
        <x-checkbox-square label="{{ $brand->name }}" labelPos="back">
            {{-- <x-icon-pc-icon fill="transparent"/> --}}
        </x-checkbox-square>
        {{-- <div class="categories-list__icon"></div> --}}
        {{-- <div class="categories-list__info"> --}}
        {{--     <p class="categories-list__brand">{{ $item->name }}</p> --}}
        {{--     <!-- <p class="categories-list__price">от 500 руб.</p> --> --}}
        {{-- </div> --}}
    </li>
    @endforeach
</ul>


