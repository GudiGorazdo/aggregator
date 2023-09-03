<div class="menu-list">
    <div class="menu-list__inner container--wide">
        <div class="menu-list__categories-wrapper">
            <h2 class="menu-list__title mb-2">Категории</h2>
            <ul class="categories-list">
                @foreach($categories as $category)
                <li>
                    <a href="#">
                        <x-icon-pc-icon />
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <section class="search-section search-section--menu">
            <div class="search-section__form">
                <form onsubmit="event.preventDefault();" role="search">
                    <input id="search" type="search" placeholder="Поиск" autofocus required />
                    <button type="submit">
                        <img src="img/icon/search-icon.svg" width="20" height="20" alt="Поиск" />
                    </button>
                </form>
            </div>

            <ul class="categories-list">
                @foreach($categories as $category)
                <li>
                    <a href="#">
                        <x-icon-pc-icon />
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </section>

        <div class="menu-list__regions-wrapper">
            <h2 class="menu-list__title mb-2">Регионы</h2>
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

        <ul class="menu-list__promos">
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


