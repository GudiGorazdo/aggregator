<section class="carousel">
    <x-carousel classMod='carousel'>
        @for ($i = 0; $i < count($photos); $i++)
            <x-carousel-item classMod="carousel"
                addAttributes="data-modal-path=photos_window data-modal-event=photosCarousel data-preview={{ $i }}">
                <img class="carousel__img" src="{{ $photos[$i]->name . '/id/' . $f[$i] }}/240/240"
                    alt="фото компании {{ $shop->name }}" />
            </x-carousel-item>
        @endfor
    </x-carousel>
    <div class="btn previous previous--centered carousel-previous"><x-icon-slider-arrow-left /></div>
    <div class="btn forwards forwards--centered carousel-forwards"><x-icon-slider-arrow-right /></div>
</section>
