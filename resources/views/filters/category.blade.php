<section id="filter-category" class="search search--filter">
    <div class="search__form">
        <form onsubmit="event.preventDefault();" role="search">
            <input id="filterSearch" type="search" placeholder="Поиск" autofocus required />
            <button type="submit">
                <x-icon-search-icon />
            </button>
        </form>
    </div>
    <div class="search--filter__main">
        <ul class="accordion accordion--categories categories-list">
            @foreach (\App\Models\Category::with('subCategories')->get() as $category)
                @include('filters.category-item', ['category' => $category])
            @endforeach
        </ul>
    </div>
    <div class="search__mobile-btns">
        <button class="btn search__mobile-btn search__mobile-btn--selection">
            <span>Выбрано (6)</span>
        </button>
        <button class="btn search__mobile-btn search__mobile-btn--clear">
            <img src="img/icon/trash.svg" alt="Очистить" />
        </button>
    </div>
</section>


