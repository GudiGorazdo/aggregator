<ul class="brands-list{{ isset($classMod) && $classMod ? " brands-list--" . $classMod : ""}}">
    @foreach ($brands as $brand)
    <li class="brands-list__item{{ isset($classMod) && $classMod ? " brands-list__item--" . $classMod : ""}}">
        <x-checkbox-square label="{{ $brand->name }}" labelPos="back">
            <x-icon-pc-icon fill="transparent"/>
        </x-checkbox-square>
        {{-- <div class="brands-list__icon"></div> --}}
        {{-- <div class="brands-list__info"> --}}
        {{--     <p class="brands-list__brand">{{ $item->name }}</p> --}}
        {{--     <!-- <p class="brands-list__price">от 500 руб.</p> --> --}}
        {{-- </div> --}}
    </li>
    @endforeach
</ul>


