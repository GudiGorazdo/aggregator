<section class="info">
    <div class="info__wrapper container">
        <div class="info__left">
            <div class="info-heading">
                <x-icon-location />
                <span class="info-heading__title">{{ $shop->address }}</span>
            </div>

            <div class="info-links">
                @if (!is_null($web))
                    <a href="{{ $web[0] }}"
                        class="info-links__link info-links__link--site">{{ $web[0] }}</a>
                @endif
                @if (!is_null($shop->vk))
                    <a href="vk.com/{{ $shop->vk[0] }}"
                        class="info-links__link info-links__link--vk">vk.com/{{ $shop->vk }}</a>
                @endif
            </div>

            @include('pages.shop.layouts.info-rating', ['shopID' => $shop->id, 'averageRating' => $shop->average_rating, 'services' => $shop->services])
            <div class="info-description">
                <h2 class="info-title mb-15">Описание</h2>
                <p class="info-description__text" id="text-slice" data-expand-target="shop-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                {{-- <button class="btn btn--more" data-expand-path="shop-description">
                    Показать все
                </button> --}}
            </div>
        </div>

        <div class="info__right">
            <div class="info__right-wrapper">
                <div class="info-contacts">
                    <div class="info-heading">
                        <x-icon-contacts />
                        <span class="info-heading__title">Контакты</span>
                    </div>

                    <div class="info-contacts__wrapper">
                        <div class="info-contacts__phones">
                            <a href="tel:{{ $shop->phone }}" class="info-contacts__phone">
                                {{ $shop->phone }}
                            </a>
                            @if (!is_null($additionalPhones))
                                @foreach ($additionalPhones as $phone)
                                    <a href="tel:{{ $phone }}" class="info-contacts__phone">
                                        {{ $phone }}
                                    </a>
                                @endforeach
                            @endif
                        </div>

                        <div class="info-contacts__socials">
                            @if (!is_null($shop->whatsapp))
                                <a href="whatsapp:{{ $shop->whatsapp }}" class="btn info-contacts__social-link">
                                    <x-icon-whatsapp-icon />
                                </a>
                            @endif
                            @if (!is_null($shop->telegram))
                                <a href="telegram:{{ $shop->telegram }}" class="btn info-contacts__social-link">
                                    <x-icon-telegram-icon width="25" height="24" viewBox="2 -0 24 24" />
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info__hours">
                    <p class="info__countdown">
                        {!! \App\Services\TitleService::timeBeforeClose($shop) !!}
                    </p>

                    @include('pages.shop.layouts.hours', ['days' => $workingMode])
                </div>
            </div>

            <div class="info-map">
                <div id='map'></div>
                <div class="info-map__overlay">
                    <button href="#" class="btn btn--primary info-map__btn">
                        <x-icon-add-icon />
                        <span>Построить маршрут</span>
                    </button>
                    <button href="#" class="btn btn--grey info-map__btn">
                        <x-icon-location-icon />
                        <span>Санкт-Петербург, ул. Ленина, д. 100</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
