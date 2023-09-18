<fieldset class="aside-toggles">
    @foreach ($filter->getItems() as $f)
    <div class="aside-toggle-box flex-btw {{ $classNamesWrapper ?? '' }}">
        <span class="aside-toggle-label">
            {{ $f['label'] }}
        </span>
        <x-checkbox-switch id="{{ $f['name'] }}" name="{{ $f['name'] }}" />
    </div>
    @endforeach
</fieldset>

