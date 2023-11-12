<x-carousel classMod='photos'>
    @for ($i = 0; $i < count($photos); $i++)
        <x-carousel-item classMod="photos">
            {{-- <div class="loader">
                <img src="{{ asset('assets/images/Loading_black.gif') }}" loading="lazy" alt="loader">
            </div> --}}
            <img src="{{ $photos[$i]->name . '/id/' . $f[$i] }}/1000/700" loading="lazy" alt="фото компании {{ $shop->name }}">
        </x-carousel-item>
    @endfor
</x-carousel>
<div class="btn previous previous--centered swiper-button-prev--photos"><x-icon-slider-arrow-left /></div>
<div class="btn forwards forwards--centered swiper-button-next--photos"><x-icon-slider-arrow-right /></div>
<div class="swiper-pagination swiper-pagination--photos"></div>
