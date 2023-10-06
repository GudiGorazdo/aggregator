<ul class="brands-list-form{{ isset($modification) && $modification ? " brands-list-form--" . $modification : ""}}">
    @foreach ($brands as $brand)
    <li class="brands-list-form__item{{ isset($modification) && $modification ? " brands-list-form__item--" . $modification : ""}}">
        <x-checkbox-square label="{{ $brand->name }}" labelPos="back">
            {{-- <x-icon-pc-icon fill="transparent"/> --}}
        </x-checkbox-square>
        {{-- <div class="brands-list-form__icon"></div> --}}
        {{-- <div class="brands-list-form__info"> --}}
        {{--     <p class="brands-list-form__brand">{{ $item->name }}</p> --}}
        {{--     <!-- <p class="brands-list-form__price">от 500 руб.</p> --> --}}
        {{-- </div> --}}
    </li>
    @endforeach
</ul>


