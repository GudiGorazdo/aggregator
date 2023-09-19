<div class="shop-card" data-shop-target={{ $shop->id }}>
    <input type="hidden" name="shop_coord" value={{ $shop->coord }} data-shop-path={{ $shop->id }}>
    <div class="shop-card__content">
        <div class="shop-card__header">
            <div class="shop-card__logo">
                <img src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100" alt="filter img" />
            </div>
            <div class="shop-card__info">
                <h4 class="shop-card__title">
                    <a href="{{ route('shop', ['id' => $shop->id]) }}">{{ $shop->name }}</a>
                </h4>
                <x-display-rating rating="{{ $shop->average_rating }}"/>
                <div class="shop-card__data">
                    <p class="shop-card__time">{{ \App\Services\TitleService::getTimeBeforeClose($shop) }}</p>
                    <a class="shop-card__address" href="#">{{ $shop->address }}</a>
                </div>
            </div>
        </div>
        <div class="shop-card__footer">
            <p class="shop-card__description">{{ $shop->description }}</p>
            <a class="btn btn--secondary shop-card__action" href="#">Отправить заявку</a>
        </div>
    </div>
    <div class="shop-card__contacts">
        <a class="btn shop-card__contact shop-card__contact--mobile-btn" href="#">
            Заявка
        </a>
        <x-social-item className="shop-card__contact shop-card__contact--telegram">
            <x-icon-telegram-icon />
        </x-social-item>
        <x-social-item className="shop-card__contact shop-card__contact--whatsapp">
            <x-icon-whatsapp-icon />
        </x-social-item>
        <x-social-item className="shop-card__contact shop-card__contact--tel">
            <x-icon-tel-icon />
        </x-social-item>
        <button class="btn shop-card__show-location" data-shop-view="{{ $shop->id }}"><x-icon-location-icon /></button>
    </div>
</div>


