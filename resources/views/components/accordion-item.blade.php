{{--
    @param string $className                     -- класс для родителя элемента аккордеона
    @param string $headerClassName               -- класс для заголовка элемента аккордеона
    @param string $headerButtonClassName         -- класс для кликабельного заголовка(кнопка открытия/закрытия)
    @param string $bodyClassName                 -- класс для тела элемента
    @param string $buttonId                      -- id кликабельного заголовка(кнопка открытия/закрытия)
    @param string $collapse                      -- идентификатор связи кнопки и тела элемента
    @param string $parent                        -- идентификатор родительского элемента, на случай если надо, чтобы мог быть открыт только один итем
    @param many $show                            -- открыт ли элемент при загрузке. Для того чтобы был открыт нужна строка 'true'

    -- эти переменные могут передовать что угодно, если они заданы, то это интерпритируется как true
    @param many $disabled                        -- доступен ли элемент пользователю
--}}

<div class="accordion-item {{ $className ?? '' }}">
    <h2 class="accordion-header {{ $headerClassName ?? '' }}">
        <button
            class="accordion-button {{  (isset($show) && $show =='true') ? '' : ' collapsed' }} {{ $headerButtonClassName ?? '' }}{{ isset($disabled) && $disabled ? ' disabled disabled--grey opacity-5' : '' }}"
            {{ isset($buttonId) ? 'id=' . $buttonId : '' }}
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#{{ $collapse }}"
            aria-expanded="{{ (isset($show) && $show =='true') ? ' true' : 'false' }}"
            aria-controls="{{ $collapse }}"
        >
            {{ $title }}
        </button>
    </h2>
    <div
        id="{{ $collapse }}"
        class="multi-collapse collapse{{  (isset($show) && $show =='true') ? ' show' : '' }}"
        aria-labelledby="{{ $collapse }}"
        {{ isset($parent) ? 'data-bs-parent=' . '#' . $parent: '' }}
    >
        <div
            {{ isset($bodyId) ? "id=" . $bodyId : ''}}
            class="accordion-body {{ $bodyClassName ?? '' }}"
        >
            {{ $slot }}
        </div>
    </div>
</div>
