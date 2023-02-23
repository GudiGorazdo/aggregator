{{--
    @param string $className                     -- класс для родителя элемента аккордеона
    @param string $headerClassName               -- класс для заголовка элемента аккордеона
    @param string $headerButtonClassName         -- класс для кликабельного заголовка(кнопка открытия/закрытия)
    @param string $bodyClassName                 -- класс для тела элемента
    @param string $buttonId                      -- id кликабельного заголовка(кнопка открытия/закрытия)
    @param string $collapse                      -- идентификатор связи кнопки и тела элемента

    -- эти переменные могут передовать что угодно, если они заданы, то это интерпритируется как true
    @param many $disabled                        -- доступен ли элемент пользователю
    @param many $show                            -- открыт ли элемент при загрузке
--}}

<div class="accordion-item {{ $className ?? '' }}">
    <h2 class="accordion-header {{ $headerClassName ?? '' }}">
        <button
            class="accordion-button {{ isset($show) ? '' : ' collapsed' }} {{ $headerButtonClassName ?? '' }}{{ isset($disabled) && $disabled ? ' disabled disabled--grey opacity-5' : '' }}"
            {{ isset($buttonId) ? 'id=' . $buttonId : '' }}
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#{{ $collapse }}"
            aria-expanded="{{ isset($show) ? ' true' : 'false' }}"
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
