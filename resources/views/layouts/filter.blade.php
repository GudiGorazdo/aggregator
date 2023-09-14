<section class="filter-section">
    <div class="flex-ctr correct" data-correct>
        <div class="filter__wrapper">
            @include('layouts.aside')
            @include('layouts.shops-list', ['shops' => $shops])
        </div>
        <div class="filter__map">
            <iframe class="filter__inf" src="https://yandex.ru/map-widget/v1/?um=constructor%3A79bc0a58a97b7cf713db850b13b423ef96beefd9d1d9b66a4b0007bdd77d18f9&amp;source=constructor" width="100%" height="521" frameborder="0"></iframe>
        </div>
    </div>
    <p class="filter__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <button class="btn filter__text-btn">Показать все</button>
</section>


