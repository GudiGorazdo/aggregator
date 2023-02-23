{{--
    @param $classNamesWrapper          -- имена классов обёртки
    @param $inputId                    -- ид поля ввода
    @param $classNamesInput            -- имена классов поля ввода
    @param $type                       -- тип
    @param $classNamesLabel            -- имена классов лэйбла
    @param $label                      -- текст лэйбла
    @param $description                -- текст блока с описанием
    @param $descriprionId              -- ид блока с описанием
    @param $classNamesDescription      -- имена классов для поля с описанием
--}}

<div class="{{ $classNamesWrapper }}">
    <label
        for="{{ $inputId }}"
        class="form-label {{ $classNamesLabel ?? '' }}"
    >{{ $label }}</label>
    <input
        id="{{ $inputId }}"
        class="form-control  {{ $classNamesInput ?? '' }}"
        type="{{ $type }}"
        {{ isset($description) ? 'aria-describedby="' . $description . '"' : '' }}
    >
    @if (isset($description))
        <div
            {{ $descriprionId ? "id=" . $descriprionId : ""}}
            class="form-text {{ $classNamesDescription ?? '' }}"
        >{{ $description }}</div>
    @endif
</div>
