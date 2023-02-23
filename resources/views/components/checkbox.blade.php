<div class="{{ $classNameWrapper }}">
    <input
        class="{{ $classNameInput }}"
        {{ $attributes }}
        type="checkbox"
        autocomplete="off"
        {{ $active }}
        {{ $dataset }}
    >
    <label class="{{ $classNameLabel }}" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
