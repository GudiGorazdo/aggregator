<label class="checkbox-square">
    <input class="checkbox-square__input" type="checkbox" autocomplete="off" />
    @if (isset($labelPos) && $labelPos == 'front')
        {{ $label }}
    @endif
    <div class="checkbox-square__icon">
        {{ $slot ?? $slot }}
    </div>
    @if (!isset($labelPos) || $labelPos == 'back')
        {{ $label }}
    @endif
</label>
