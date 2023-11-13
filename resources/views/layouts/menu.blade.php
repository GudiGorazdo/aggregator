<div class="menu">
    <div class="menu__inner container-wide">
        <div class="menu__categories-wrapper">
            <h2 class="menu__title mb-2">Категории</h2>
            <ul class="categories-list">
                @foreach($categories as $category)
                <li>
                    <a href="#">
                        <x-icon-pc-icon class="categories-list__icon" />
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <section class="search-category search-category--menu">
            <div class="search-category__form">
                <form onsubmit="event.preventDefault();" role="search">
                    <input id="search-category" type="search" placeholder="Поиск" autofocus required />
                    <button type="submit">
                        <x-icon-search-icon />
                    </button>
                </form>
            </div>

            <ul class="categories-list">
                @foreach($categories as $category)
                <li>
                    <a href="#">
                        <x-icon-pc-icon class="categories-list__icon" />
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </section>

        <div class="menu__regions-wrapper">
            <h2 class="menu__title mb-2">Регионы</h2>
            <ul class="regions-list">
                @foreach($areas as $area)
                <li>
                    <a href="#">
                        {{ $area->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <ul class="menu__promos">
            @for($i=0; $i<3; $i++)
                <li>
                    <a href="#">
                        <img src="{{ asset('assets/img/categories/sale/1.jpg')}}" alt="Promo banner" />
                    </a>
                </li>
            @endfor
        </ul>
    </div>
</div>


