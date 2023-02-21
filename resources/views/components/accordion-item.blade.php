<div class="accordion-item {{ $className ?? '' }}">
    <h2 class="accordion-header {{ $headerClassName ?? '' }}" id="item_{{ $id }}">
        <button
            class="accordion-button collapsed {{ $headerButtonClassName ?? '' }}{{ isset($disabled) && $disabled ? ' disabled disabled--grey opacity-5' : '' }}"
            {{ isset($buttonId) ? 'id=' . $buttonId : '' }}
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#{{ $collapse }}"
            aria-expanded="false"
            aria-controls="{{ $collapse }}"
        >
            {{ $title }}
        </button>
    </h2>
    <div id="{{ $collapse }}" class="multi-collapse collapse{{ isset($show) ? ' show' : '' }}">
        <div
            {{ isset($bodyId) ? "id=" . $bodyId : ''}}
            class="accordion-body {{ $bodyClassName ?? '' }}"
        >
            {{ $slot }}
        </div>
    </div>
</div>
