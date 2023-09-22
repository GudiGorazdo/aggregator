<section class="filter">
    @include('layouts.aside')
    <div class="flex-ctr correct filter__wrapper" data-correct>
        {{-- @include('layouts.aside') --}}
        @include('layouts.shops-list', ['shops' => $shops])
        <div id="filter-map" class="filter__map"></div>
    </div>
</section>
<p class="filter__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<button class="btn filter__text-btn">Показать все</button>


