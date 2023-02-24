<div class="{{ $classNamesWrapper }}">
    <input
        id="{{ $id }}"
        class="{{ $classNamesInput }}"
        {{ $attributes }}
        type="checkbox"
        autocomplete="off"
        {{ $active }}
        {{ $dataset }}
    >
    <label class="{{ $classNamesLabel }}" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
