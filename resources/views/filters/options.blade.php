<fieldset class="filters-options">
    @foreach ($filter->getItems() as $f)
        <x-check-box
            id="{{ $f['name'] }}"
            name="{{ $f['name'] }}"
            value="1"
            line="{{ true }}"
            active="{{ $request[$f['name']] ?? false }}"
        >
            {{ $f['label'] }}
        </x-check-box>
    @endforeach
</fieldset>
