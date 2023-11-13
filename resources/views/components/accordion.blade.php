<div class="accordion{{ isset($modifier) ? " accordion--$modifier" : '' }}">
    <input id="{{ $id }}"
        class="accordion__checkbox{{ isset($modifier) ? " accordion__checkbox--$modifier" : '' }}"
        type="checkbox"
        autocomplete="off"
    />
    <label for="{{ $id }}"
        class="accordion__header{{ isset($modifier) ? " accordion__header--$modifier" : '' }}" role="button">
        {{ $title }}
    </label>
    <div class="accordion__body{{ isset($modifier) ? " accordion__body--$modifier" : '' }}">
        <div
            class="accordion__content{{ isset($modifier) ? " accordion__content--$modifier" : '' }}"
            {{ $contentAttributes ?? '' }}
        >
            {{ $slot }}
        </div>
    </div>
</div>
