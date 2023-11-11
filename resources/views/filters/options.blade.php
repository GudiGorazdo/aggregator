<fieldset class="aside__toggles">
    @foreach ($filter->getItems() as $f)
        <div class="aside__toggle-box flex-btw {{ $classNamesWrapper ?? '' }}">
            <span class="aside__toggle-label">
                {{ $f['label'] }}
            </span>
            <x-checkbox-switch id="{{ $f['name'] }}" name="{{ $f['name'] }}" />
        </div>
    @endforeach
</fieldset>
