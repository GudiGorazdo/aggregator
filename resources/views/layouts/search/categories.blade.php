<section class="search{{ getModifiedClass('search', [$modifier, 'categories']) }}">
    <div class="search__form{{ getModifiedClass('search__form', [$modifier, 'categories']) }}">
        <form onsubmit="event.preventDefault();" role="search">
            <input id="{{ $inputID }}"
                class="search__input{{ getModifiedClass('search__input', [$modifier, 'categories']) }}"
                name="{{ $inputName }}" type="search" placeholder="Поиск" autofocus required />
            <button class="search__button{{ getModifiedClass('search__button', [$modifier, 'categories']) }}" type="submit">
                <x-icon-search-icon />
            </button>
        </form>
    </div>
    @include('layouts.categories-list.' . $categoriesListType , ['categories' => $categories, 'modifier' => $modifier])
    <div class="search__action{{ getModifiedClass('search__action', [$modifier, 'categories']) }}">
        <button class="btn btn--primary search__btn search__btn--selection{{ getModifiedClass('search__btn', [$modifier, 'categories']) }}">
            <span>Выбрано (6)</span>
        </button>
        <button class="btn search__btn search__btn--clear{{ getModifiedClass('search__btn', [$modifier, 'categories']) }}">
            <img src="img/icon/trash.svg" alt="Очистить" />
        </button>
    </div>
</section>
