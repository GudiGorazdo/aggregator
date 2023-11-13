<section class="search{{ getModifiedClass('search', [$modifier, 'categories']) }}">
    <div class="search__form">
        <form onsubmit="event.preventDefault();" role="search">
            <input id="{{ $inputID }}"
                class="search__input"
                name="{{ $inputName }}" type="search" placeholder="Поиск" autofocus required />
            <button class="search__button" type="submit">
                <x-icon-search-icon />
            </button>
        </form>
    </div>
    @include('layouts.categories-list.' . $categoriesListType , ['categories' => $categories, 'modifier' => $modifier])
    <div class="search__action">
        <button class="btn btn--primary search__btn search__btn--selection">
            <span>Выбрано (6)</span>
        </button>
        <button class="btn search__btn search__btn--clear">
            <img src="img/icon/trash.svg" alt="Очистить" />
        </button>
    </div>
</section>
