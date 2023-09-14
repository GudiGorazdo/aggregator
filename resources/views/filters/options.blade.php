<fieldset class="filter__aside-toggles">
    @foreach ($filter->getItems() as $f)
        <x-checkbox-slider
            id="{{ $f['name'] }}"
            name="{{ $f['name'] }}"
            value="1"
            line="{{ true }}"
            active="{{ $request[$f['name']] ?? false }}"
            poslabel="before"
        >
            {{ $f['label'] }}
        </x-checkbox-slider>
    @endforeach
</fieldset>


