<div class="{{ $classNamesWrapper }}">
    <input
        class="{{ $classNamesInput }}"
        {{ $attributes }}
        type="checkbox"
        autocomplete="off"
        {{ $active }}
        {{ $dataset }}
        id="{{ $id }}"
        {{-- checked --}}
    >
    <label class="{{ $classNamesLabel }}" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
