<section class="similar">
    <div class="container">
        <h3 class="title display-4 text-center">Похожие магазины</h3>
        <div class="similar-swiper-wrapper">
            <div class="swiper similar-swiper">
                <div class="swiper-wrapper">
                    @foreach ($similar as $shop)
                        <div class="swiper-slide">
                            <x-similar-card :shop="$shop"/>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-prev similar-swiper-button-prev"></div>
            <div class="swiper-button-next similar-swiper-button-next"></div>
        </div>
        {{-- <div class="similar_content mb-3">
            <div class="similar_categories">
                <h4 class="">скупка категорий техники:</h4>
                <ul>
                    <li>Скупка телефонов</li>
                    <li>Скупка планшетов</li>
                    <li>Скупка фотоаппаратов</li>
                </ul>
            </div>
            <div class="similar_areas">
                <h4 class="">скупка в других районах:</h4>
                <ul>
                    <li>Скупка в Центральном районе</li>
                    <li>Скупка Ленинском районе</li>
                    <li>Скупка Калининском районе</li>
                </ul>
            </div>
        </div> --}}
    </div>
</section>
