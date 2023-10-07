<div id="shop-list" class="shop-list">
    @foreach($shops as $shop)
        @include('layouts.shop-card', ['shop' => $shop])
    @endforeach
    <button class="btn shop-list__more" data-state="close">
        <span>Показать еще</span>
    </button>
</div>


