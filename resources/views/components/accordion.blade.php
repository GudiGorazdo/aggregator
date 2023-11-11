<div class="accordion{{ isset($modification) ? " accordion--$modification" : '' }}">
    <input id="{{ $id }}"
        class="accordion__checkbox{{ isset($modification) ? " accordion__checkbox--$modification" : '' }}"
        type="checkbox" />
    <label for="{{ $id }}"
        class="accordion__header{{ isset($modification) ? " accordion__header--$modification" : '' }}" role="button">
        {{ $title }}
    </label>
    <div class="accordion__body{{ isset($modification) ? " accordion__body--$modification" : '' }}">
        <div
            class="accordion__content{{ isset($modification) ? " accordion__content--$modification" : '' }}"
            {{ $contentAttributes ?? '' }}
        >
            {{ $slot }}
        </div>
    </div>
</div>
