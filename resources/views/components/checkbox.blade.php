<div class="form-check{{ isset($line) & $line ? ' form-check--line' : '' }}">
    <input
        id="{{ $id }}"
        class="form-check-input{{ isset($line) & $line ? ' form-check-input--line' : '' }}"
        type="checkbox"
        autocomplete="off"
        value="{{ $value ?? '' }}"
        {{ $fullName ?? '' }}
        {{ isset($name) && !isset($fullName) ? 'name='.$name : '' }}
        {{ isset($active) && $active ? 'checked' : '' }}
    >
    <label class="form-check-label{{ isset($line) & $line ? ' form-check-label--line' : '' }}" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
