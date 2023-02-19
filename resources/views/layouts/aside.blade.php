<button class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></button>
<aside class="aside">
    <button class="aside_close">Закрыть</button>
    <div class="aside_logo"><img src="https://picsum.photos/id/{{ rand(1, 250) }}/100/100" alt="LOGO"></div>
    <button class="aside_add-shop btn btn-primary">добавить организацию</button>
    <div class="aside-city" id="aside_city"></div>
    <div class="aside-filters">
        <form id="filters_form" class="aside-filters_form" action="/" method="GET">
            @csrf
            @include('filters.category')
            <input id="filter_city" type="text" hidden vlue="" name="city">
            {{-- <div class="aside-filters_rating">
                <div class="d-flex flex-row">
                    <div class="ratings mr-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <span></span>
                </div>
            </div> --}}
            <x-star-rating rating="{{ $requestData['rating'] ?? false }}">kjsdhfakjsdhaksdjl</x-star-rating>
            @include('filters.location')
            @include('filters.options')
            <button id="filters_apply" class="btn btn-primary" type="submit">Применить</button>
        </form>
        <a href="/" class="btn btn-primary" type="submit">Сбросить все фильтры</a>
    </div>
</aside>
