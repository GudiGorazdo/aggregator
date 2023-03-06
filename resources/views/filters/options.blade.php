<fieldset class="filters-options">
    @foreach ($filter->getItems() as $f)
        <x-checkbox
            id="{{ $f['name'] }}"
            name="{{ $f['name'] }}"
            value="1"
            line="{{ true }}"
            active="{{ $request[$f['name']] ?? false }}"
        >
            {{ $f['label'] }}
        </x-checkbox>
    @endforeach
</fieldset>
