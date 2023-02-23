<div class="{{ $classNameWrapper }}">
    <input
        id="{{ $id }}"
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
