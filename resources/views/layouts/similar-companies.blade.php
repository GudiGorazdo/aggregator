<section class="similar-section container">
    <h2 class="similar-heading">Похожие компании</h2>

    <div class="similar-list swiper">
        <div class="swiper-wrapper">
            @foreach ($similars as $similar)
            <div class="similar-list__item swiper-slide">
                <div class="similar-list__card">
                    <div class="similar-list__img-box">
                        <img src="{{ asset('assets/img/item/card-photo.jpg') }}" alt="Фото компании" />
                    </div>
                    <div class="similar-list__info-box">
                        <h3 class="similar-list__title"><a href="/shop/{{ $similar->id }}">{{ $similar->name }}</a></h3>
                        <x-display-rating rating="{{ $similar->average_rating }}" disabled={{true}} shopID="{{ $similar->id }}"/>
                        <p class="similar-list__open-status">{{ \App\Services\TitleService::getTimeBeforeClose($similar, true) }}</p>
                        <p class="similar-list__address">{{ $similar->address }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="actions">
            <div class="btn similar-previous"><x-icon-slider-arrow-left /></div>
            <div class="btn similar-forwards"><x-icon-slider-arrow-right /></div>
        </div>
    </div>
</section>


