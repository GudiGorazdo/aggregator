<div id="shop-list" class="filter__content">
    @foreach($shops as $shop)
        {{-- @php dd($shop->toArray()) @endphp --}}
        <x-shop-card :shop="$shop" />
    @endforeach
    {{-- <button class="filter__row-action-btn filter__content-more" data-state="close"> --}}
    {{--     <span>Показать еще</span> --}}
    {{-- </button> --}}
</div>


