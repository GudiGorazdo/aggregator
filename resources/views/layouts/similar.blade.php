<section class="categories-section">
    <div class="container">
        <h2 class="categories__title">Похожие категории</h2>

        <div class="categories__inner">
            <div>
                <div class="categories__items">
                    <a href="#">
                        <x-icon-categories-page.1 />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.2 />
                        <h3>Фотоаппараты</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.3 />
                        <h3>Ноутбуки</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.4 />
                        <h3>Телевизоры</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.5 />
                        <h3>Персональные ПК</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.2 />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.1 />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.1 />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <x-icon-categories-page.1 />
                        <h3>Телефоны</h3>
                    </a>
                </div>

                <button class="btn categories__item-btn categories__expand" data-button="moreactive">
                    Показать все
                </button>
            </div>

            <div class="categories__regions">
                <div class="categories__regions-list">
                    @foreach (\App\Models\Area::getByCityID($cityID)->get() as $area)
                        <a href="#">{{ $area->name }}</a>
                    @endforeach
                </div>
                <button class="btn categories__item-btn regions__expand" data-button="district">
                    Показать все
                </button>
            </div>
        </div>
    </div>
</section>


