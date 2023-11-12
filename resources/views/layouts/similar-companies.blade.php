<section class="similar-companies container">
    <h2 class="similar-companies__title">Похожие компании</h2>

    <div class="similar-companies__carousel">
        <x-carousel classMod='similar-companies' alt="фото компании" >
            @foreach ($similars as $similar)
                <x-carousel-item classMod="similar-companies" >
                    @include('layouts.similar-company-card', ['similar' => $similar])
                </x-carousel-item>
            @endforeach
        </x-carousel>
        <div class="similar-companies__navigation">
            <div class="btn previous previous--centered similar-companies-previous"><x-icon-slider-arrow-left /></div>
            <div class="btn forwards forwards--centered similar-companies-forwards"><x-icon-slider-arrow-right /></div>
        </div>
    </div>
</section>


