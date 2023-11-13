<section id="filter-category" class="search-category search-category--filter">
    <div class="search-category__form">
        <form onsubmit="event.preventDefault();" role="search">
            <input id="filterSearch" type="search" placeholder="Поиск" autofocus required />
            <button type="submit">
                <x-icon-search-icon />
            </button>
        </form>
    </div>
    @include('layouts.categories-list-form', [
        'categories' => \App\Models\Category::with('subCategories')->get(),
    ])
    <div class="search-category__action">
        <button class="btn search-category__btn search-category__btn--selection">
            <span>Выбрано (6)</span>
        </button>
        <button class="btn search-category__btn search-category__btn--clear">
            <img src="img/icon/trash.svg" alt="Очистить" />
        </button>
    </div>
</section>
