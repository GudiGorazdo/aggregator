<header class="header tm-header-toparea container">
    <div class="row align-items-center justify-content-between">
        <div class="header_logo"><img src="https://picsum.photos/id/{{ rand(1, 250) }}/100/50" alt="LOGO"></div>
        {{ (new \App\Filters\CityFilter('city', 'Город', 'city_id', ['id'=>'aside_city', 'input_id' => 'filter_city']))->render() }}
        {{-- <button
            id="burger"
            class="js-colorlib-nav-toggle colorlib-nav-toggle"
            data-modal-path="aside_menu"
            data-modal-animation="fadeInLeft"
            data-modal-one-button="true"
        ><i></i></button> --}}
    </div>
</header>
