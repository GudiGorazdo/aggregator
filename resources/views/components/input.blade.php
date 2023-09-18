{{--
    @param $name                       -- атрибут name
    @param $classNamesWrapper          -- имена классов обёртки
    @param $inputId                    -- ид поля ввода
    @param $classNamesInput            -- имена классов поля ввода
    @param $type                       -- тип инпута
    @param $classNamesLabel            -- имена классов лэйбла
    @param $label                      -- текст лэйбла
    @param $description                -- текст блока с описанием
    @param $descriprionId              -- ид блока с описанием
    @param $classNamesDescription      -- имена классов для поля с описанием
    @params $required                  -- required
    @params $placeholder               -- placeholder
--}}
<div {{ $classNamesWrapper ? 'class=' . $classNamesWrapper : '' }}>
    <label
        for="{{ $inputId }}"
        class="{{ $classNamesLabel ?? '' }}"
        {{ !isset($label) ? "hidden" : '' }}
    >{{ $label ?? '' }}</label>
    <input
        id="{{ $inputId }}"
        class="{{ $classNamesInput ?? '' }} @error($name) is-invalid @enderror"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name) ?? ($value ?? '') }}"
        placeholder="{{ $placeholder ?? '' }}"
        {{ isset($description) ? 'aria-describedby=' . $description : '' }}
        {{ isset($required) ? "required" : "" }}
    >
    @if (isset($description))
        <div
            class="{{ $classNamesDescription ?? '' }}"
            {{ $descriprionId ? "id=" . $descriprionId : ""}}
        >{{ $description }}</div>
    @endif
    @error($name)
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

