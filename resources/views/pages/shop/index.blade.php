@extends('layouts.master')

@section('title')
<title>Agregator</title>
@endsection

@section('styles')
<link rel="preload" href="{{ asset('assets/images/Loading_black.gif') }}" as="image">
@endsection

@section('content')
<section class="carousel-section">
    <div class="carousel">
        <a href="#after-slides" class="skip"> Skip Slides </a>
        <div class="carousel__container" tabindex="0">
            <ul class="slides">
                @foreach ($photos as $photo)
                <li class="slide">
                    <img class="preview_img" src="{{ $photo->name . '/id/' . rand(10, 100) }}/150/150" alt="фото компании {{ $shop->name }}" />
                </li>
                @endforeach
            </ul>
        </div>
        <div class="actions">
            <button type="button" class="btn previous" aria-label="Previous slide">
                <img src="img/icon/slider-arrow-left.svg" alt="Вперед" />
            </button>
            <button type="button" class="btn forwards" aria-label="Next slide">
                <img src="img/icon/slider-arrow-right.svg" alt="Вперед" />
            </button>
        </div>
    </div>
</section>

<section class="item-header-section">
    <div class="container">
        <div class="item-header-section__inner">
            <h1 class="item-title">
                Комиссионный магазин<br />Вселенское счастье
            </h1>
            <a href="#" class="btn btn--apply">Заявка на оценку</a>
        </div>
    </div>

    <a href="#" class="btn item-header-section__back-btn"><img src="img/icon/slider-arrow-left.svg" alt="Назад" /></a>
</section>

<section class="item-body-section">
    <div class="item-info container">
        <div class="item-info__left-col">
            <div class="item-info__address-box">
                <img src="img/item/location.svg" width="40" height="40" alt="Адрес" class="item-info__address-icon" />
                <span class="item-info__address-text">Санкт-Петербург, ул. Ленина, д. 100</span>
            </div>

            <div class="item-info__links-box">
                <a href="lombard.ru" class="item-info__link item-info__link--site">www.lombard.ru</a>
                <a href="vk.com/friday_ru" class="item-info__link item-info__link--vk">vk.com/friday_ru</a>
            </div>

            <div class="item-info__rating-box">
                <h2 class="item-info__heading mb-12">Общий рейтинг</h2>
                <div class="item-info__rating">
                    <p class="item-info__rating-num">3.0</p>
                    <select class="star-rating">
                        <option value="">Выберите рейтинг</option>
                        <option value="5">Отлично</option>
                        <option value="4">Очень хорошо</option>
                        <option value="3">Удовлетворительно</option>
                        <option value="2">Плохо</option>
                        <option value="1">Ужасно</option>
                    </select>
                </div>

                <table class="item-info__rating-table">
                    <tr>
                        <th class="item-info__rating-table--logo-box">
                            <img src="img/item/yandex-logo.svg" alt="Яндекс Карты" />
                        </th>
                        <td>
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="item-info__rating-table--logo-box">
                            <img src="img/item/google-maps-logo.svg" alt="Яндекс Карты" />
                        </th>
                        <td>
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="item-info__rating-table--logo-box">
                            <img src="img/item/2gis-logo.svg" alt="Яндекс Карты" />
                        </th>
                        <td>
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="item-info__rating-table--logo-box">
                            <img src="img/item/avito-logo.svg" alt="Яндекс Карты" />
                        </th>
                        <td>
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="item-info__description-box">
                <h2 class="item-info__heading mb-15">Описание</h2>
                <p class="item-info__description-text" id="text-slice">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                    sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <button class="btn item-info__description-text-btn">
                    Показать все
                </button>
            </div>
        </div>

        <div class="item-info__right-col">
            <div class="item-info__right-col-box">
                <div class="item-info__right-info-box">
                    <div class="item-info__address-box">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" class="item-info__address-icon" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="12" fill="#B4E040" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9519 11.8336C14.5929 11.0366 14.2155 11.0183 13.875 11.0092C13.5988 11 13.2767 11 12.9546 11C12.6324 11 12.117 11.1191 11.6752 11.5954C11.2334 12.0718 10 13.226 10 15.5802C10 17.9253 11.7212 20.1971 11.9605 20.5177C12.1998 20.8384 15.2832 25.8125 20.1522 27.727C24.2021 29.3209 25.0305 29.0003 25.9049 28.9179C26.7793 28.8354 28.7398 27.7637 29.1448 26.6461C29.5405 25.5285 29.5405 24.5758 29.4209 24.3743C29.3012 24.1728 28.9791 24.0537 28.5005 23.8155C28.0219 23.5773 25.6656 22.4231 25.2238 22.2582C24.782 22.1025 24.4598 22.0201 24.1469 22.4964C23.8247 22.9727 22.9043 24.0445 22.6282 24.3651C22.3521 24.6858 22.0667 24.7224 21.5881 24.4842C21.1095 24.246 19.5632 23.7422 17.7315 22.1117C16.3049 20.8475 15.3384 19.2811 15.0623 18.8047C14.7862 18.3284 15.0347 18.0719 15.274 17.8337C15.4857 17.623 15.7526 17.2749 15.9919 17.0001C16.2313 16.7253 16.3141 16.5238 16.4706 16.2032C16.627 15.8825 16.5534 15.6077 16.4337 15.3695C16.3141 15.1405 15.3753 12.7771 14.9519 11.8336Z" fill="#25313A" />
                        </svg>
                        <span class="item-info__address-text item-info__contacts-text">Контакты</span>
                    </div>

                    <div class="item-info__contacts-box">
                        <div class="item-info__phones-box">
                            <a href="tel:+70000000000" class="item-info__phone">+ 7 (000) 000-00-00
                            </a>
                            <a href="tel:+70000000000" class="item-info__phone">+ 7 (000) 000-00-00
                            </a>
                        </div>

                        <div class="item-info__socials-box">
                            <a href="#" class="btn item-info__social-link">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.05368 20.2889C14.8841 17.7487 18.7719 16.074 20.7172 15.2649C26.2715 12.9547 27.4256 12.5534 28.1778 12.5402C28.3433 12.5373 28.7132 12.5783 28.9528 12.7727C29.1551 12.9369 29.2108 13.1587 29.2375 13.3143C29.2641 13.47 29.2973 13.8246 29.2709 14.1017C28.9699 17.2641 27.6676 24.9386 27.005 28.4806C26.7246 29.9794 26.1726 30.4819 25.6382 30.5311C24.4767 30.638 23.5948 29.7635 22.4699 29.0261C20.7096 27.8723 19.7152 27.154 18.0066 26.028C16.0319 24.7268 17.312 24.0116 18.4373 22.8428C18.7318 22.5369 23.8492 17.8823 23.9482 17.46C23.9606 17.4072 23.9721 17.2104 23.8551 17.1065C23.7382 17.0025 23.5656 17.0381 23.4411 17.0663C23.2645 17.1064 20.4525 18.965 15.0049 22.6423C14.2067 23.1904 13.4838 23.4574 12.836 23.4434C12.1219 23.428 10.7483 23.0397 9.72709 22.7077C8.47459 22.3006 7.47913 22.0853 7.56581 21.3939C7.61096 21.0337 8.10692 20.6654 9.05368 20.2889Z" fill="white" />
                                </svg>
                            </a>
                            <a href="#" class="btn item-info__social-link">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 22L1.55492 16.3536C0.5936 14.6963 0.0893027 12.8194 0.0945558 10.9007C0.0945558 4.88831 5.01146 0 11.0473 0C13.9785 0 16.7311 1.13451 18.7956 3.19439C20.8653 5.25428 22.0052 7.99382 22 10.9059C22 16.9183 17.0831 21.8066 11.042 21.8066H11.0368C9.20343 21.8066 7.40162 21.3465 5.79942 20.4786L0 22ZM6.07784 18.5076L6.40878 18.7063C7.80611 19.5323 9.4083 19.9663 11.042 19.9715H11.0473C16.064 19.9715 20.1509 15.9092 20.1509 10.9111C20.1509 8.49049 19.2053 6.21625 17.4876 4.50143C15.7698 2.7866 13.4795 1.84553 11.0473 1.84553C6.03056 1.8403 1.94365 5.90257 1.94365 10.9007C1.94365 12.6103 2.42168 14.278 3.33572 15.721L3.5511 16.0661L2.6318 19.4068L6.07784 18.5076Z" fill="white" />
                                    <path d="M0 22L1.55492 16.3536C0.5936 14.6963 0.0893027 12.8194 0.0945558 10.9007C0.0945558 4.88831 5.01146 0 11.0473 0C13.9785 0 16.7311 1.13451 18.7956 3.19439C20.8653 5.25428 22.0052 7.99382 22 10.9059C22 16.9183 17.0831 21.8066 11.042 21.8066H11.0368C9.20343 21.8066 7.40162 21.3465 5.79942 20.4786L0 22ZM6.07784 18.5076L6.40878 18.7063C7.80611 19.5323 9.4083 19.9663 11.042 19.9715H11.0473C16.064 19.9715 20.1509 15.9092 20.1509 10.9111C20.1509 8.49049 19.2053 6.21625 17.4876 4.50143C15.7698 2.7866 13.4795 1.84553 11.0473 1.84553C6.03056 1.8403 1.94365 5.90257 1.94365 10.9007C1.94365 12.6103 2.42168 14.278 3.33572 15.721L3.5511 16.0661L2.6318 19.4068L6.07784 18.5076Z" fill="url(#paint0_linear_227_6653)" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.31005 6.34173C8.10518 5.88688 7.88981 5.87642 7.69544 5.8712C7.53785 5.86597 7.35399 5.86597 7.17013 5.86597C6.98627 5.86597 6.6921 5.93393 6.43995 6.2058C6.1878 6.47766 5.48389 7.1364 5.48389 8.48004C5.48389 9.81844 6.46622 11.115 6.6028 11.298C6.73938 11.481 8.49917 14.3199 11.2781 15.4125C13.5894 16.3222 14.0622 16.1393 14.5612 16.0922C15.0603 16.0451 16.1792 15.4335 16.4103 14.7956C16.6362 14.1578 16.6362 13.6141 16.5679 13.499C16.4996 13.384 16.3158 13.3161 16.0426 13.1801C15.7695 13.0442 14.4247 12.3855 14.1725 12.2913C13.9204 12.2025 13.7365 12.1554 13.5579 12.4273C13.374 12.6991 12.8487 13.3108 12.6911 13.4938C12.5335 13.6768 12.3707 13.6977 12.0975 13.5618C11.8244 13.4259 10.9419 13.1383 9.89649 12.2077C9.08226 11.4862 8.53068 10.5922 8.37309 10.3203C8.2155 10.0485 8.35733 9.90209 8.49391 9.76616C8.61473 9.64591 8.76707 9.44724 8.90365 9.2904C9.04024 9.13355 9.08751 9.01853 9.17682 8.83555C9.26612 8.65256 9.22409 8.49572 9.1558 8.35979C9.08751 8.22908 8.5517 6.88023 8.31005 6.34173Z" fill="white" />
                                    <defs>
                                        <linearGradient id="paint0_linear_227_6653" x1="11.0021" y1="21.9979" x2="11.0021" y2="0" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#F9F9F9" />
                                            <stop offset="1" stop-color="white" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </a>
                            <a href="#" class="btn item-info__social-link"> </a>
                        </div>
                    </div>
                </div>

                <div class="item-info__working-hours-box">
                    <p class="item-info__working-hours-text">
                        До закрытия 5 часов 13 минут
                    </p>

                    <table class="item-info__working-hours-table">
                        <thead>
                            <tr>
                                <th>ПН</th>
                                <th>ВТ</th>
                                <th>СР</th>
                                <th>ЧТ</th>
                                <th>ПТ</th>
                                <th class="item-info__working-hours-table--mobile--weekend">
                                    СБ
                                </th>
                                <th class="item-info__working-hours-table--mobile--weekend">
                                    ВС
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="item-info__working-hours-dot item-info__working-hours-dot--active">
                                        &nbsp;
                                    </div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>09:00</td>
                                <td>09:00</td>
                                <td>09:00</td>
                                <td>09:00</td>
                                <td>09:00</td>
                                <td>09:00</td>
                                <td style="color: #eb423e">Выходной</td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>21:00</td>
                                <td>21:00</td>
                                <td>21:00</td>
                                <td>21:00</td>
                                <td>21:00</td>
                                <td>21:00</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td>
                                    <div class="item-info__working-hours-dot">&nbsp;</div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="item-info__working-hours-table--mobile">
                        <tbody>
                            <tr>
                                <th>ПН</th>
                                <td>09:00 - 21:00</td>
                            </tr>
                            <tr>
                                <th>ВТ</th>
                                <td>09:00 - 21:00</td>
                            </tr>
                            <tr>
                                <th>СР</th>
                                <td>09:00 - 21:00</td>
                            </tr>
                            <tr>
                                <th>ЧТ</th>
                                <td>09:00 - 21:00</td>
                            </tr>
                            <tr>
                                <th>ПТ</th>
                                <td>09:00 - 21:00</td>
                            </tr>
                            <tr class="item-info__working-hours-table--mobile--weekend">
                                <th>СБ</th>
                                <td style="color: #25313a !important">09:00 - 21:00</td>
                            </tr>
                            <tr class="item-info__working-hours-table--mobile--weekend">
                                <th>ВС</th>
                                <td>Выходной</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="item-info__map-box">
                <div class="item-info__map-box--inner">
                    <iframe class="filter__inf" src="https://yandex.ru/map-widget/v1/?um=constructor%3A79bc0a58a97b7cf713db850b13b423ef96beefd9d1d9b66a4b0007bdd77d18f9&amp;source=constructor" width="100%" height="360" frameborder="0"></iframe>
                    <div class="item-info__map-overlay">
                        <button href="#" class="btn item-info__map-btn item-info__map-btn--primary">
                            <img src="img/icon/add-icon.svg" alt="" />
                            <span>Построить маршрут</span>
                        </button>
                        <button href="#" class="btn item-info__map-btn item-info__map-btn--location">
                            <img src="img/icon/location-icon.svg" alt="" />
                            <span>Санкт-Петербург, ул. Ленина, д. 100</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="brands-section">
    <div class="brands__container container--wide">
        <div class="brands__content">
            <h2 class="brands__heading">Можно продать</h2>

            <ul class="accordion accordion--brands">
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="accordion-item-1" class="accordion__checkbox" checked />
                    <label for="accordion-item-1" class="accordion__header accordion__header--brands" role="button">
                        <span class="brands-accordion__title">Телефоны </span>
                        <span class="brands-accordion__price-range">до 100 000 руб.</span>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <ul class="brands-list brands-list--main">
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item brands-list__item--main">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="accordion__body-inner--brands-2">
                                <ul class="accordion__breadcrumbs">
                                    <li>
                                        <button class="btn accordion__breadcrumbs-btn">
                                            Стиральные машины (60)
                                        </button>
                                    </li>
                                </ul>
                                <ul class="brands-list">
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Еще пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Еще пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Еще пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Еще пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Еще пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Еще пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Еще пункт</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пример</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пример</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Пример</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="accordion-item-2" class="accordion__checkbox" />
                    <label for="accordion-item-2" class="accordion__header accordion__header--brands" role="button">
                        <span class="brands-accordion__title">Ноутбуки </span>
                        <span class="brands-accordion__price-range">до 100 000 руб.</span>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <ul class="brands-list">
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="accordion-item-3" class="accordion__checkbox" />
                    <label for="accordion-item-3" class="accordion__header accordion__header--brands" role="button">
                        <span class="brands-accordion__title">Фотоаппараты </span>
                        <span class="brands-accordion__price-range">до 100 000 руб.</span>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <ul class="brands-list">
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="accordion-item-2" class="accordion__checkbox" />
                    <label for="accordion-item-2" class="accordion__header accordion__header--brands" role="button">
                        <span class="brands-accordion__title">Ноутбуки </span>
                        <span class="brands-accordion__price-range">до 100 000 руб.</span>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <ul class="brands-list">
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="accordion-item-3" class="accordion__checkbox" />
                    <label for="accordion-item-3" class="accordion__header accordion__header--brands" role="button">
                        <span class="brands-accordion__title">Фотоаппараты </span>
                        <span class="brands-accordion__price-range">до 100 000 руб.</span>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <ul class="brands-list">
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Samsung</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">iPhone</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">HTC</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">TECNO</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>

                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                    <li class="brands-list__item">
                                        <div class="brands-list__icon"></div>
                                        <div class="brands-list__info">
                                            <p class="brands-list__brand">Honor</p>
                                            <p class="brands-list__price">от 500 руб.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <button class="btn brands-list__more-btn">Показать все</button>
        </div>
    </div>
</section>

<section class="testimonials-section">
    <div class="container testimonials__inner">
        <div class="testimonials__heading-box">
            <h2 class="testimonials__heading">Отзывы</h2>
            <div class="testimonials__main-rating">
                <span class="testimonials__main-num">3.2</span>
                <select class="star-rating">
                    <option value="">Выберите рейтинг</option>
                    <option value="5">Отлично</option>
                    <option value="4">Очень хорошо</option>
                    <option value="3">Удовлетворительно</option>
                    <option value="2">Плохо</option>
                    <option value="1">Ужасно</option>
                </select>
            </div>
        </div>

        <p class="testimonials__text">
            Все актуальные отзывы об организации можно посмотреть на странице
            компании на соответствующем сервисе
        </p>

        <div class="tabset">
            <!-- Tab 1 -->
            <input type="radio" name="tabset" id="tab1" />
            <label for="tab1">
                <img src="img/item/yandex-logo.svg" alt="Яндекс Карты" />
                <span class="btn testimonials__number">100 оценок</span>
                <div class="item-info__rating-table--rating">
                    <p class="item-info__rating-table--rating-num">3.2</p>
                    <select class="star-rating">
                        <option value="">Выберите рейтинг</option>
                        <option value="5">Отлично</option>
                        <option value="4">Очень хорошо</option>
                        <option value="3">Удовлетворительно</option>
                        <option value="2">Плохо</option>
                        <option value="1">Ужасно</option>
                    </select>
                </div>
            </label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" checked />
            <label for="tab2">
                <img src="img/item/google-maps-logo.svg" alt="Google Maps" />
                <span class="btn testimonials__number">100</span>
                <div class="item-info__rating-table--rating">
                    <p class="item-info__rating-table--rating-num">3.2</p>
                    <select class="star-rating">
                        <option value="">Выберите рейтинг</option>
                        <option value="5">Отлично</option>
                        <option value="4">Очень хорошо</option>
                        <option value="3">Удовлетворительно</option>
                        <option value="2">Плохо</option>
                        <option value="1">Ужасно</option>
                    </select>
                </div>
            </label>
            <!-- Tab 3 -->
            <input type="radio" name="tabset" id="tab3" />
            <label for="tab3">
                <img src="img/item/2gis-logo.svg" alt="2gis" />
                <span class="btn testimonials__number">100</span>
                <div class="item-info__rating-table--rating">
                    <p class="item-info__rating-table--rating-num">3.2</p>
                    <select class="star-rating">
                        <option value="">Выберите рейтинг</option>
                        <option value="5">Отлично</option>
                        <option value="4">Очень хорошо</option>
                        <option value="3">Удовлетворительно</option>
                        <option value="2">Плохо</option>
                        <option value="1">Ужасно</option>
                    </select>
                </div>
            </label>
            <!-- Tab 4 -->
            <input type="radio" name="tabset" id="tab4" />
            <label for="tab4">
                <img src="img/item/avito-logo.svg" alt="Avito" />
                <span class="btn testimonials__number">100</span>
                <div class="item-info__rating-table--rating">
                    <p class="item-info__rating-table--rating-num">3.2</p>
                    <select class="star-rating">
                        <option value="">Выберите рейтинг</option>
                        <option value="5">Отлично</option>
                        <option value="4">Очень хорошо</option>
                        <option value="3">Удовлетворительно</option>
                        <option value="2">Плохо</option>
                        <option value="1">Ужасно</option>
                    </select>
                </div>
            </label>

            <div class="tab-panels">
                <section id="yandex-maps" class="tab-panel">
                    <div class="testimonials__tab-header">
                        <div class="testimonials__tab-select">
                            <div class="itc-select" id="googleSelect">
                                <!-- Кнопка для открытия выпадающего списка -->
                                <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                    Сначала новые
                                </button>
                                <!-- Выпадающий список -->
                                <div class="itc-select__dropdown">
                                    <ul class="itc-select__options">
                                        <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                            Сначала новые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                            Сначала старые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                            Сначала положительные
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                            Сначала негативные
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn item-info__link item-info__link--site testimonials__tab-link">Перейти в карточку организации</a>
                    </div>
                    <div class="testimonials__tab-body-container">
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="google-maps" class="tab-panel">
                    <div class="testimonials__tab-header">
                        <div class="testimonials__tab-select">
                            <div class="itc-select" id="googleSelect">
                                <!-- Кнопка для открытия выпадающего списка -->
                                <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                    Сначала новые
                                </button>
                                <!-- Выпадающий список -->
                                <div class="itc-select__dropdown">
                                    <ul class="itc-select__options">
                                        <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                            Сначала новые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                            Сначала старые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                            Сначала положительные
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                            Сначала негативные
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn item-info__link item-info__link--site testimonials__tab-link">Перейти в карточку организации</a>
                    </div>
                    <div class="testimonials__tab-body-container">
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="2gis" class="tab-panel">
                    <div class="testimonials__tab-header">
                        <div class="testimonials__tab-select">
                            <div class="itc-select" id="googleSelect">
                                <!-- Кнопка для открытия выпадающего списка -->
                                <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                    Сначала новые
                                </button>
                                <!-- Выпадающий список -->
                                <div class="itc-select__dropdown">
                                    <ul class="itc-select__options">
                                        <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                            Сначала новые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                            Сначала старые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                            Сначала положительные
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                            Сначала негативные
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn item-info__link item-info__link--site testimonials__tab-link">Перейти в карточку организации</a>
                    </div>
                    <div class="testimonials__tab-body-container">
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="avito" class="tab-panel">
                    <div class="testimonials__tab-header">
                        <div class="testimonials__tab-select">
                            <div class="itc-select" id="googleSelect">
                                <!-- Кнопка для открытия выпадающего списка -->
                                <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                    Сначала новые
                                </button>
                                <!-- Выпадающий список -->
                                <div class="itc-select__dropdown">
                                    <ul class="itc-select__options">
                                        <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                            Сначала новые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                            Сначала старые
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                            Сначала положительные
                                        </li>
                                        <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                            Сначала негативные
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn item-info__link item-info__link--site testimonials__tab-link">Перейти в карточку организации</a>
                    </div>
                    <div class="testimonials__tab-body-container">
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="testimonials__tab-item">
                            <div class="testimonials__tab-item--header">
                                <div class="testimonials__tab-item--photo">
                                    <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                </div>
                                <div class="testimonials__tab-item--user-info">
                                    <p class="testimonials__tab-item--user-name">User</p>
                                    <p class="testimonials__tab-item--testimonial-date">
                                        00.00.000
                                    </p>
                                </div>
                            </div>
                            <p class="testimonials__tab-item--text">
                                Lorem ipsum dolor sit amet,
                            </p>
                            <div class="testimonials__tab-item--reply-box">
                                <p class="testimonials__tab-item--reply-date">
                                    Ответ от 00.00.000
                                </p>
                                <p class="testimonials__tab-item--reply-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="tabset--mobile">
            <ul class="accordion">
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-1" class="accordion__checkbox" checked />
                    <label for="testimonials-accordion-item-1" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/yandex-logo.svg" alt="Яндекс Карты" />
                        <div class="testimonials-acordion__info-box">
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>

                            <span class="btn testimonials__number">100 оценок</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-2" class="accordion__checkbox" />
                    <label for="testimonials-accordion-item-2" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/google-maps-logo.svg" alt="Google Maps" />
                        <div class="testimonials-acordion__info-box">
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>
                            <span class="btn testimonials__number">10000 оценок</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-4" class="accordion__checkbox" />
                    <label for="testimonials-accordion-item-4" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/2gis-logo.svg" alt="2gis" />
                        <div class="testimonials-acordion__info-box">
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>

                            <span class="btn testimonials__number">100</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-3" class="accordion__checkbox" />
                    <label for="testimonials-accordion-item-3" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/avito-logo.svg" alt="Avito" />
                        <div class="testimonials-acordion__info-box">
                            <div class="item-info__rating-table--rating">
                                <p class="item-info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>

                            <span class="btn testimonials__number">100</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- <a href="#" class="link item-info__link item-info__link--site"
    >Перейти в карточку организации</a
  > -->
    </div>
</section>

<section class="similar-section container">
    <h2 class="similar-heading">Похожие компании</h2>

    <ul class="similar-list" id="scroll-list">
        <li class="similar-list__item">
            <div class="similar-list__card">
                <div class="similar-list__img-box">
                    <img src="img/item/card-photo.jpg" alt="Фото компании" />
                </div>
                <div class="similar-list__info-box">
                    <h3 class="similar-list__title">Вселенское счастье</h3>
                    <div class="similar-list__rating">
                        <span class="similar-list__num">3.2</span>
                        <select class="star-rating">
                            <option value="">Выберите рейтинг</option>
                            <option value="5">Отлично</option>
                            <option value="4">Очень хорошо</option>
                            <option value="3">Удовлетворительно</option>
                            <option value="2">Плохо</option>
                            <option value="1">Ужасно</option>
                        </select>
                    </div>
                    <p class="similar-list__open-status">Работает до 19:00</p>
                    <p class="similar-list__address">ул. Ленина, д.100</p>
                </div>
            </div>
        </li>

        <li class="similar-list__item">
            <div class="similar-list__card">
                <div class="similar-list__img-box">
                    <img src="img/item/card-photo.jpg" alt="Фото компании" />
                </div>
                <div class="similar-list__info-box">
                    <h3 class="similar-list__title">Вселенское счастье</h3>
                    <div class="similar-list__rating">
                        <span class="similar-list__num">3.2</span>
                        <select class="star-rating">
                            <option value="">Выберите рейтинг</option>
                            <option value="5">Отлично</option>
                            <option value="4">Очень хорошо</option>
                            <option value="3">Удовлетворительно</option>
                            <option value="2">Плохо</option>
                            <option value="1">Ужасно</option>
                        </select>
                    </div>
                    <p class="similar-list__open-status">Работает до 19:00</p>
                    <p class="similar-list__address">ул. Ленина, д.100</p>
                </div>
            </div>
        </li>

        <li class="similar-list__item">
            <div class="similar-list__card">
                <div class="similar-list__img-box">
                    <img src="img/item/card-photo.jpg" alt="Фото компании" />
                </div>
                <div class="similar-list__info-box">
                    <h3 class="similar-list__title">Вселенское счастье</h3>
                    <div class="similar-list__rating">
                        <span class="similar-list__num">3.2</span>
                        <select class="star-rating">
                            <option value="">Выберите рейтинг</option>
                            <option value="5">Отлично</option>
                            <option value="4">Очень хорошо</option>
                            <option value="3">Удовлетворительно</option>
                            <option value="2">Плохо</option>
                            <option value="1">Ужасно</option>
                        </select>
                    </div>
                    <p class="similar-list__open-status">Работает до 19:00</p>
                    <p class="similar-list__address">ул. Ленина, д.100</p>
                </div>
            </div>
        </li>

        <li class="similar-list__item">
            <div class="similar-list__card">
                <div class="similar-list__img-box">
                    <img src="img/item/card-photo.jpg" alt="Фото компании" />
                </div>
                <div class="similar-list__info-box">
                    <h3 class="similar-list__title">Вселенское счастье</h3>
                    <div class="similar-list__rating">
                        <span class="similar-list__num">3.2</span>
                        <select class="star-rating">
                            <option value="">Выберите рейтинг</option>
                            <option value="5">Отлично</option>
                            <option value="4">Очень хорошо</option>
                            <option value="3">Удовлетворительно</option>
                            <option value="2">Плохо</option>
                            <option value="1">Ужасно</option>
                        </select>
                    </div>
                    <p class="similar-list__open-status">Работает до 19:00</p>
                    <p class="similar-list__address">ул. Ленина, д.100</p>
                </div>
            </div>
        </li>
    </ul>
</section>

<section class="categories-section">
    <div class="container">
        <h2 class="categories__title">Похожие категории</h2>

        <div class="categories__inner">
            <div>
                <div class="categories__items">
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/2.svg" alt="" />
                        <h3>Фотоаппараты</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/3.svg" alt="" />
                        <h3>Ноутбуки</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/4.svg" alt="" />
                        <h3>Телевизоры</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/5.svg" alt="" />
                        <h3>Персональные ПК</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/2.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                </div>

                <button class="btn categories__item-btn categories__expand" data-button="moreactive">
                    Показать все
                </button>
            </div>

            <div class="categories__regions">
                <div class="categories__regions-list">
                    <a href="#">Центральный район</a>
                    <a href="#">Ленинский район</a>
                    <a href="#">Свердловский район</a>
                    <a href="#">Одинцвоский район</a>
                    <a href="#">Южный район</a>
                    <a href="#">Ленинский район</a>
                    <a href="#">Ленинский район</a>
                    <a href="#">Свердловский район</a>
                    <a href="#">Одинцвоский район</a>
                    <a href="#">Южный район</a>
                </div>
                <!-- <a href="#">Скупка в других районах</a> -->
                <button class="btn categories__item-btn regions__expand" data-button="district">
                    Показать все
                </button>
            </div>
        </div>
    </div>
</section>

<section class="mobile-nav-section">
    <div class="mobile-nav-section__box">
        <button class="btn mobile-filter-toggle-btn">
            <img src="img/icon/arrow-square-up.svg" alt="Открыть фильтр" />
            <span>Фильтр</span>
        </button>
        <button class="btn mobile-toggle-btn mobile-toggle-btn--places">
            <img src="img/icon/places-icon.svg" alt="Открыть список мест" />
        </button>
        <button class="btn mobile-toggle-btn mobile-toggle-btn--map">
            <img src="img/icon/map-icon.svg" alt="Открыть карту" />
        </button>
    </div>

    <a class="btn hero-section-btn" href="#">Отправить заявку всем</a>
</section>
@endsection

@section('afterFooter')
<script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
@vite(['resources/js/scripts/pages/shop.js'])
@endsection


