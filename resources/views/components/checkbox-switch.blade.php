<label class="checkbox-switch {{ $classNameLabel ?? '' }}" for="{{ $id ?? '' }}">
    <input id="{{ $id ?? '' }}" {{ $attributes ?? '' }} type="checkbox" autocomplete="off" />
    <div class="checkbox-switch__slider"></div>
</label>
