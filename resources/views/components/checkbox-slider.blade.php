<div class="filter__aside-toggle-box flex-btw {{ $classNamesWrapper ?? '' }}">
    @if ($poslabel === 'before')
        <span class="filter__aside-toggle-label">
            {{ $slot }}
        </span>
    @endif
    <label class="switch {{ $classnameslabel ?? '' }}" for="{{ $id ?? '' }}">
        <input
            {{ $classNamesWrapper ?? '' }}
            {{ $attributes  ?? ''}}
            type="checkbox"
            autocomplete="off"
            {{ $active  ?? ''}}
            {{ $dataset  ?? ''}}
            id="{{ $id  ?? ''}}"
        />
        <div class="slider"></div>
    </label>
    @if ($poslabel === 'after')
        <span class="filter__aside-toggle-label">
            {{ $slot }}
        </span>
    @endif
</div>


