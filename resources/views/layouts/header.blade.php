<header class="header tm-header-toparea container">
    <div class="row align-items-center justify-content-between">
        <div class="header_logo"><img src="https://picsum.photos/id/{{ rand(1, 250) }}/100/50" alt="LOGO"></div>
        {{ app(\App\Services\FilterService::class)->getFilterByName('CityFilter')->render() }}
    </div>
</header>
