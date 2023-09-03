@extends('layouts.master')

@section('title')
<title>Agregator</title>
@endsection

@section('links_scripts')
<link rel="preconnect" href="//api-maps.yandex.ru">
<link rel="dns-prefetch" href="//api-maps.yandex.ru">
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=latlong" type="text/javascript" async=""></script>
@endsection

@section('styles')
@endsection

@section('content')
<section class="hero-section container--wide mb-45">
    <div class="hero-section-content flex-ctr">
        <h1 class="hero-section-title">{{ $title }}</h1>
        <div class="hero-section-text-box">
            <p class="hero-section-text">
                Срочный выкуп ноутбуков, телефонов, планшетов, фотоаппаратов в
                любом состоянии.
            </p>
            <p class="hero-section-text">
                Срочный выкуп ноутбуков, телефонов, планшетов, фотоаппаратов в
                любом состоянии.
            </p>
            <p class="hero-section-text">
                Срочный выкуп ноутбуков, телефонов, планшетов, фотоаппаратов в
                любом состоянии.
            </p>
            <button class="btn hero-section-text-expand-btn"></button>
        </div>
        <a class="btn hero-section-btn" href="#">Отправить заявку всем</a>
    </div>
</section>

<section class="filter-section">
    <div class="flex-ctr correct" data-correct>
        <div class="filter__wrapper">
            <aside class="filter__aside">
                <div class="filter__aside--collapsed">
                    <button class="btn filter__aside-btn">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9333 15.8917C11.9333 16.4 11.5999 17.0667 11.1749 17.325L9.99997 18.0833C8.9083 18.7583 7.39163 18 7.39163 16.65V12.1917C7.39163 11.6 7.0583 10.8417 6.71663 10.425L3.51661 7.05833C3.09161 6.63333 2.7583 5.88334 2.7583 5.375V3.44167C2.7583 2.43333 3.51665 1.675 4.44165 1.675H15.5583C16.4833 1.675 17.2416 2.43333 17.2416 3.35833V5.20833C17.2416 5.88333 16.8166 6.725 16.4 7.14167" stroke="#25313A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.3918 13.7667C14.8645 13.7667 16.0585 12.5728 16.0585 11.1C16.0585 9.62725 14.8645 8.43333 13.3918 8.43333C11.919 8.43333 10.7251 9.62725 10.7251 11.1C10.7251 12.5728 11.919 13.7667 13.3918 13.7667Z" stroke="#25313A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16.5584 14.2667L15.7251 13.4333" stroke="#25313A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="btn filter__aside-btn">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.25 12.5H8.75C11.25 12.5 12.5 11.25 12.5 8.75V6.25C12.5 3.75 11.25 2.5 8.75 2.5H6.25C3.75 2.5 2.5 3.75 2.5 6.25V8.75C2.5 11.25 3.75 12.5 6.25 12.5Z" stroke="#25313A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21.25 12.5H23.75C26.25 12.5 27.5 11.25 27.5 8.75V6.25C27.5 3.75 26.25 2.5 23.75 2.5H21.25C18.75 2.5 17.5 3.75 17.5 6.25V8.75C17.5 11.25 18.75 12.5 21.25 12.5Z" stroke="#25313A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21.25 27.5H23.75C26.25 27.5 27.5 26.25 27.5 23.75V21.25C27.5 18.75 26.25 17.5 23.75 17.5H21.25C18.75 17.5 17.5 18.75 17.5 21.25V23.75C17.5 26.25 18.75 27.5 21.25 27.5Z" stroke="#25313A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.25 27.5H8.75C11.25 27.5 12.5 26.25 12.5 23.75V21.25C12.5 18.75 11.25 17.5 8.75 17.5H6.25C3.75 17.5 2.5 18.75 2.5 21.25V23.75C2.5 26.25 3.75 27.5 6.25 27.5Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="filter__aside-btn--span">5</span>
                    </button>
                    <button class="btn filter__aside-btn">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.0001 16.7875C17.154 16.7875 18.9001 15.0414 18.9001 12.8875C18.9001 10.7336 17.154 8.98749 15.0001 8.98749C12.8462 8.98749 11.1001 10.7336 11.1001 12.8875C11.1001 15.0414 12.8462 16.7875 15.0001 16.7875Z" stroke="#25313A" stroke-width="1.5" />
                            <path d="M4.52512 10.6125C6.98762 -0.212497 23.0251 -0.199997 25.4751 10.625C26.9126 16.975 22.9626 22.35 19.5001 25.675C16.9876 28.1 13.0126 28.1 10.4876 25.675C7.03762 22.35 3.08762 16.9625 4.52512 10.6125Z" stroke="#25313A" stroke-width="1.5" />
                        </svg>

                        <span class="filter__aside-btn--span">5</span>
                    </button>
                    <button class="btn filter__aside-btn">
                        <svg width="28" height="33" viewBox="0 0 28 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M27.2609 13.662C27.2609 6.1215 21.17 0 13.6304 0C6.10736 0 0 6.1215 0 13.662C0 17.4405 1.53095 20.856 4.00024 23.3145C4.19778 23.5125 4.47763 23.6445 4.77394 23.6445C5.38303 23.6445 5.87689 23.1495 5.87689 22.539C5.87689 22.2255 5.76166 21.945 5.54765 21.7305C3.48992 19.668 2.22235 16.797 2.22235 13.662C2.22235 7.359 7.32553 2.211 13.614 2.211C19.9024 2.211 25.0385 7.3425 25.0385 13.662C25.0385 16.83 23.771 19.6845 21.6968 21.7635L12.0666 31.416L13.6304 33L23.2936 23.3145C25.7464 20.856 27.2609 17.4405 27.2609 13.662Z" fill="#25313A" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9516 16.302L16.544 7.68903L13.6796 12.7215L10.7988 7.68903L7.40763 16.302H6.41992V17.589H11.5396V16.302H10.7823L11.5231 14.157L13.6796 17.688L15.8361 14.157L16.5769 16.302H15.8032V17.589H20.9558V16.302H19.9516Z" fill="#25313A" />
                        </svg>

                        <span class="filter__aside-btn--span">5</span>
                    </button>
                    <div class="filter__summ-ratig">
                        <img src="img/aside/star.svg" alt="" />
                        <p>3.0</p>
                    </div>
                    <button class="btn filter__aside-btn">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.3332 10C18.3332 14.6 14.5998 18.3334 9.99984 18.3334C5.39984 18.3334 1.6665 14.6 1.6665 10C1.6665 5.40002 5.39984 1.66669 9.99984 1.66669C14.5998 1.66669 18.3332 5.40002 18.3332 10Z" stroke="#25313A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.0919 12.65L10.5086 11.1084C10.0586 10.8417 9.69189 10.2 9.69189 9.67503V6.25836" stroke="#25313A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="btn filter__aside-btn">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0171 4.69971H18.0838" stroke="#25313A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.9165 4.70013H7.98317" stroke="#25313A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.0171 12.7751H18.0838" stroke="#25313A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.0171 17.8247H18.0838" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.0742 7.72502V1.66669" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.9165 18.3333L7.98317 12.275" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.98317 18.3333L1.9165 12.275" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>

                <div class="filter__aside--expanded">
                    <div class="flex-btw">
                        <button class="btn filter__collapse-btn">
                            <span> Фильтр </span>
                        </button>

                        <button class="btn filter__aside-clear-btn">
                            <img src="img/icon/trash.svg" width="20" height="20" alt="Очистить" />
                            <span>Очистить</span>
                        </button>
                    </div>

                    <div class="mb-3">
                        <p class="filter__aside-label mt-3 mb-15">Категории</p>
                        <div class="itc-select" id="filter-select-1">
                            <!-- Кнопка для открытия выпадающего списка -->
                            <button type="button" class="itc-select__toggle categories-select categories-select-right" name="city" value="spb" data-select="toggle" data-index="0">
                                Категории
                            </button>
                        </div>

                        <p class="filter__aside-label mt-3 mb-15">Район</p>
                        <div class="itc-select" id="filter-select-2">
                            <!-- Кнопка для открытия выпадающего списка -->
                            <button type="button" class="itc-select__toggle categories-select-right" name="city" value="spb" data-select="toggle" data-index="0">
                                Район
                            </button>
                            <!-- Выпадающий список -->
                            <div class="itc-select__dropdown">
                                <ul class="itc-select__options">
                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="spb" data-index="0">
                                        Санкт-Петербург
                                    </li>
                                    <li class="itc-select__option" data-select="option" data-value="moscow" data-index="1">
                                        Москва
                                    </li>
                                    <li class="itc-select__option" data-select="option" data-value="" data-index="2">
                                        Санкт-Петербург
                                    </li>
                                    <li class="itc-select__option" data-select="option" data-value="" data-index="3">
                                        Санкт-Петербург
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <p class="filter__aside-label mt-3 mb-15">Метро</p>
                        <div class="itc-select" id="filter-select-3">
                            <!-- Кнопка для открытия выпадающего списка -->
                            <button type="button" class="itc-select__toggle categories-select-right" name="city" value="spb" data-select="toggle" data-index="0">
                                Метро
                            </button>
                            <!-- Выпадающий список -->
                            <div class="itc-select__dropdown">
                                <ul class="itc-select__options">
                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="spb" data-index="0">
                                        Санкт-Петербург
                                    </li>
                                    <li class="itc-select__option" data-select="option" data-value="moscow" data-index="1">
                                        Москва
                                    </li>
                                    <li class="itc-select__option" data-select="option" data-value="" data-index="2">
                                        Санкт-Петербург
                                    </li>
                                    <li class="itc-select__option" data-select="option" data-value="" data-index="3">
                                        Санкт-Петербург
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="filter__aside-rating-box">
                        <p class="filter__aside-label mb-15">Рейтинг</p>
                        <div class="filter__top-rating">
                            <p class="filter__top-num">3.0</p>
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

                    <div class="filter__aside-toggles">
                        <div class="filter__aside-toggle-box flex-btw">
                            <span class="filter__aside-toggle-label">Работает сейчас</span>
                            <label class="switch" for="isOpenCheckbox">
                                <input type="checkbox" id="isOpenCheckbox" checked />
                                <div class="slider"></div>
                            </label>
                        </div>

                        <div class="filter__aside-toggle-box flex-btw">
                            <span class="filter__aside-toggle-label">Онлайн оценка</span>
                            <label class="switch" for="hasOnlineRatingCheckbox">
                                <input type="checkbox" id="hasOnlineRatingCheckbox" checked />
                                <div class="slider"></div>
                            </label>
                        </div>

                        <div class="filter__aside-toggle-box flex-btw">
                            <span class="filter__aside-toggle-label">Срочный выкуп</span>
                            <label class="switch" for="urgentCheckbox">
                                <input type="checkbox" id="urgentCheckbox" />
                                <div class="slider"></div>
                            </label>
                        </div>

                        <div class="filter__aside-toggle-box flex-btw">
                            <span class="filter__aside-toggle-label">Ломбард</span>
                            <label class="switch" for="lombardCheckbox">
                                <input type="checkbox" id="lombardCheckbox" />
                                <div class="slider"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </aside>

            <section class="search-section search-section--filter">
                <div class="search-section--filter__main">
                    <div class="search-section__form">
                        <form onsubmit="event.preventDefault();" role="search">
                            <input id="filterSearch" type="search" placeholder="Поиск" autofocus required />
                            <button type="submit">
                                <img src="img/icon/search-icon.svg" width="20" height="20" alt="Поиск" />
                            </button>
                        </form>
                    </div>
                    <ul class="accordion accordion--categories categories-list">
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-1" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-1" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Стиральные машины
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Стиральные машины (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">Samsung</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">Samsung</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">Samsung</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">Samsung</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">Samsung</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>

                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">iPhone</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">iPhone</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">iPhone</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">iPhone</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">iPhone</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>

                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">HTC</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">HTC</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">HTC</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">HTC</p>
                                                    <!-- <p class="brands-list__price">от 500 руб.</p> -->
                                                </div>
                                            </li>
                                            <li class="brands-list__item">
                                                <div class="brands-list__icon"></div>
                                                <div class="brands-list__info">
                                                    <p class="brands-list__brand">HTC</p>
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-2" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-2" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Холодильники
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Холодильники (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-3" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-3" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Газовые плиты
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Газовые плиты (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-4" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-4" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Швейные машины
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Швейные машины (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-5" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-5" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Телевизоры
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Телевизоры (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-6" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-6" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Электроплиты
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Электроплиты (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-7" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-7" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Ноутбки
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Ноутбуки (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-8" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-8" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Компьютеры
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Компьютеры (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-9" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-9" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Микроволновки
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">
                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Микроволновки (60)
                                                </button>
                                            </li>
                                        </ul>
                                        <ul class="brands-list brands-list--categories">
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
                        <li class="accordion__item accordion__item--categories">
                            <input type="checkbox" id="accordion-item-10" class="accordion__checkbox" data-input__checkbox />
                            <label for="accordion-item-10" class="accordion__header accordion__header--categories" role="button">
                                <img src="img/categories/pc-icon.svg" alt="" />
                                Фотоаппараты
                            </label>
                            <img class="accordion__categories__into" src="./img/icon-chevron-down.svg" alt="arrow" data-select__menu>
                            <div class="accordion__body accordion__body--categories">
                                <div class="accordion__body-inner accordion__body-inner--categories">
                                    <div class="accordion__body-content accordion__body-content--categories accordion__body-content--categories--search">

                                        <ul class="accordion__breadcrumbs accordion__breadcrumbs--search">
                                            <li>
                                                <button class="btn accordion__breadcrumbs-btn accordion__breadcrumbs-btn--search accordion__breadcrumbs-btn--search--1">
                                                    Фотоаппараты (60)
                                                </button>
                                            </li>
                                        </ul>

                                        <ul class="brands-list brands-list--categories">
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
                </div>

                <!-- <button
                class="filter__row-action-btn filter__row-action-btn--clear"
              >
                <span>Очистить</span>
              </button> -->

                <div class="search-section__mobile-btns">
                    <button class="btn search-section__mobile-btn search-section__mobile-btn--selection">
                        <span>Выбрано (6)</span>
                    </button>
                    <button class="btn search-section__mobile-btn search-section__mobile-btn--clear">
                        <img src="img/icon/trash.svg" alt="Очистить" />
                    </button>
                </div>
            </section>

            <div class="filter__content">
                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <div class="filter__cart-item">
                    <div class="filter__item-content">
                        <div class="filter__top-wrapper">
                            <div class="filter__top-img">
                                <img src="img/filter/1.jpg" alt="filter img" />
                            </div>
                            <div class="filter__top-info">
                                <h4 class="filter__top-title">
                                    Коммисионный магазин Вселенское счастье
                                </h4>
                                <div class="filter__top-rating">
                                    <p class="filter__top-num">3.2</p>
                                    <select class="star-rating">
                                        <option value="">Выберите рейтинг</option>
                                        <option value="5">Отлично</option>
                                        <option value="4">Очень хорошо</option>
                                        <option value="3">Удовлетворительно</option>
                                        <option value="2">Плохо</option>
                                        <option value="1">Ужасно</option>
                                    </select>
                                </div>
                                <div class="filter__top-adress--wrapper">
                                    <p class="filter__top-time">Работает до 19:00</p>
                                    <a class="filter__top-adress" href="#">ул. Ленина или подлинее адрес, д.100</a>
                                </div>
                            </div>
                        </div>
                        <div class="filter__bottom-wrapper">
                            <p class="filter__bottom-text">
                                Lorem ipsum dolor sit amet, consectsetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <a class="filter__bottom-btn" href="#">Отправить заявку</a>
                        </div>
                    </div>
                    <div class="filter__item-contacts">
                        <a class="btn filter__item-contact filter__item-contact--mobile-btn" href="#">
                            Заявка
                        </a>
                        <a class="filter__item-contact filter__item-contact--telegram" href="#">
                            <img src="img/icon/telegram-icon.svg" alt="Связаться через Telegram" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--whatsapp" href="#">
                            <img src="img/icon/whatsapp-icon.svg" alt="Связаться через WhatsApp" />
                        </a>
                        <a class="filter__item-contact filter__item-contact--tel" href="#">
                            <img src="img/icon/tel-icon.svg" alt="Связаться по телефону" />
                        </a>
                    </div>
                </div>

                <button class="filter__row-action-btn filter__content-more" data-state="close">
                    <span>Показать еще</span>
                </button>
            </div>
        </div>
        <div class="filter__map">
            <iframe class="filter__inf" src="https://yandex.ru/map-widget/v1/?um=constructor%3A79bc0a58a97b7cf713db850b13b423ef96beefd9d1d9b66a4b0007bdd77d18f9&amp;source=constructor" width="100%" height="521" frameborder="0"></iframe>
        </div>
    </div>
    <p class="filter__text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
        minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
        culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <button class="btn filter__text-btn">Показать все</button>
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

{{-- <section class="home container"> --}}
{{-- <h2 class="title display-3 text-center mb-3"> {{ $title }}</h2> --}}
{{-- <div class="descrtiption text-center mb-4"> --}}
{{-- <div class="descrtiption-mobile"> --}}
{{-- <x-link --}}
{{-- class="more-link" --}}
{{-- href="#more_description" --}}
{{-- data-bs-toggle="collapse" --}}
{{-- aria-expanded="false" --}}
{{-- aria-controls="more_description" --}}
{{-- role="button" --}}
{{-- >Подробнее ...</x-link> --}}
{{-- <div class="collapse" id="more_description"> --}}
{{-- Далеко-далеко за словесными горами, в стране гласных и согласных живут рыбные тексты. Всеми единственное выйти раз буквоград даже это языком букв своих речью до. Щеке, за последний. Пояс страна страну свое свой? --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <p class="descrtiption-desktop descrtiption-desktop--upper"> --}}
{{-- Далеко-далеко за словесными горами, в стране гласных и согласных живут рыбные тексты. Всеми единственное выйти раз буквоград даже это языком букв своих речью до. Щеке, за последний. Пояс страна страну свое свой? --}}
{{-- </p> --}}
{{-- </div> --}}
{{-- <div class="home-buttons-wrapper"> --}}
{{-- @if (!count($shops) < 1) --}}
{{-- <x-button-fixed-bottom --}}
{{-- data-modal-path="site-alert" --}}
{{-- data-modal-one-button="true" --}}
{{-- data-alert="Этот функционал временно не доступен." --}}
{{-- >Отправить заявку всем</x-button-fixed-bottom> --}}
{{-- @endif --}}
{{-- <x-button-site --}}
{{-- id="show_filters" --}}
{{-- class="filters-show me-2" --}}
{{-- data-modal-path="aside_menu" --}}
{{-- data-modal-animation="fadeInLeft" --}}
{{-- data-modal-one-button="true" --}}
{{-- ><span>Ф</span><span>и</span><span>л</span><span>ь</span><span>т</span><span>р</span><span>ы</span></x-button-site> --}}
{{-- <x-button-site id="change-display" class="change-display">Карта</x-button-site> --}}
{{-- </div> --}}
{{-- --}}
{{-- <div class="home-content-wrapper mb-5"> --}}
{{-- <div id="shops-map" class="shops-map"></div> --}}
{{-- <ul id="shop_list" class="shop-list"> --}}
{{-- @if (count($shops) < 1) --}}
{{-- <li class="shop_not-found text-danger"> --}}
{{-- По вашему запросу ничего не найдено ... --}}
{{-- </li> --}}
{{-- @else --}}
{{-- @foreach ($shops as $shop) --}}
{{-- <li id="anchor_{{ $shop->id }}" --}}
{{-- class="shop-list_item mb-4" --}}
{{-- data-shop-target={{ $shop->id }} --}}
{{-- ><x-shop-card :shop="$shop"/></li> --}}
{{-- @endforeach --}}
{{-- @endif --}}
{{-- </ul> --}}
{{-- </div> --}}
{{-- --}}
{{-- <p class="descrtiption-desktop descrtiption-desktop--lower"> --}}
{{-- Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Злых, на берегу бросил за продолжил ты маленькая они возвращайся подпоясал составитель свой выйти запятых всемогущая домах она рыбного жизни lorem!Безопасную, инициал. Залетают, свою рукопись? Первую раз силуэт большого если необходимыми. Заголовок, власти лучше. Переписывается, страна всеми имени предложения меня рукописи не коварный свой дорогу, одна назад своего заголовок снова. --}}
{{-- </p> --}}
{{-- </section> --}}
@endsection

@section('modal')
@endsection

@section('afterFooter')
{{-- <script defer src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript" crossorigin="anonymous"></script> --}}
{{-- <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script> --}}
{{-- @vite([ 'resources/js/scripts/pages/home.js' ]) --}}
@endsection


