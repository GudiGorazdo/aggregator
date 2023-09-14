<section class="search-section search-section--filter">
    <div class="search-section__form">
        <form onsubmit="event.preventDefault();" role="search">
            <input id="filterSearch" type="search" placeholder="Поиск" autofocus required />
            <button type="submit">
                <x-icon-search-icon />
            </button>
        </form>
    </div>
    <div class="search-section--filter__main">
        <ul class="accordion accordion--categories categories-list">
            @foreach (\App\Models\Category::with('subCategories')->get() as $category)
                <li class="accordion__item accordion__item--categories">
                    <input type="checkbox" id="accordion-item-{{ $category->id }}" class="accordion__checkbox" data-input__checkbox />
                    <label for="accordion-item-{{ $category->id }}" class="accordion__header accordion__header--categories" role="button">
                        <x-icon-pc-icon />
                        {{ $category->name }}
                    </label>
                    <x-icon-chevron-down class="accordion__categories__into" data-select__menu />
                    <div class="accordion__body accordion__body--categories">
                        <div class="accordion__body-inner accordion__body-inner--categories">
                            <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                    <li>
                                        <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                            {{ $category->name }} ({{ count($category->subCategories) }})
                                        </button>
                                    </li>
                                </ul>
                                <ul class="brands-list brands-list--categories">
                                    @foreach ($category->subCategories as $item)
                                        <li class="brands-list__item">
                                            <div class="brands-list__icon"></div>
                                            <div class="brands-list__info">
                                                <p class="brands-list__brand">{{ $item->name }}</p>
                                                <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="search-section__mobile-btns">
        <button class="btn search-section__mobile-btn search-section__mobile-btn--selection">
            <span>Выбрано (6)</span>
        </button>
        <button class="btn search-section__mobile-btn search-section__mobile-btn--clear">
            <img src="img/icon/trash.svg" alt="Очистить" />
        </button>
    </div>
</section>


