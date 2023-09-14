<div class="filter__cart-item">
    <div class="filter__item-content">
        <div class="filter__top-wrapper">
            <div class="filter__top-img">
                <img src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100" alt="filter img" />
            </div>
            <div class="filter__top-info">
                <h4 class="filter__top-title">
                    <a href="{{ route('shop', ['id' => $shop->id]) }}">{{ $shop->name }}</a>
                </h4>
                <div class="filter__top-rating">
                  <p class="filter__top-num">{{ $shop->average_rating }}</p>
                  <x-star-rating rating="{{ $shop->average_rating }}" disabled={{true}} shopID="{{ $shop->id }}" />
                </div>
                <div class="filter__top-adress--wrapper">
                    <p class="filter__top-time">Работает до 19:00</p>
                    <a class="filter__top-adress" href="#">{{ $shop->address }}</a>
                </div>
            </div>
        </div>
        <div class="filter__bottom-wrapper">
            <p class="filter__bottom-text">{{ $shop->description }}</p>
            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
        </div>
    </div>
    <div class="filter__item-contacts">
        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
            Заявка
        </a>
        <x-social-item className="filter__item-contact filter__item-contact--telegram">
            <x-icon-telegram-icon />
        </x-social-item>
        <x-social-item className="filter__item-contact filter__item-contact--whatsapp">
            <x-icon-whatsapp-icon />
        </x-social-item>
        <x-social-item className="filter__item-contact filter__item-contact--tel">
            <x-icon-tel-icon />
        </x-social-item>
    </div>
</div>


