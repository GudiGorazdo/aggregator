<section class="testimonials">
    <div class="container testimonials__content">
        <div class="testimonials__left">
            <div class="testimonials__heading">
                <h2 class="testimonials__title">Отзывы</h2>
                <x-display-rating rating="{{ $shop->average_rating }}" disabled={{ true }}
                    classMod="testimonials-average" />
            </div>

            <p class="testimonials__description">
                Все актуальные отзывы об организации можно посмотреть
                на странице компании на соответствующем сервисе
            </p>

            <div class="testimonials__tabset">
                @foreach ($shop->services as $service)
                    <input class="testimonials__checkbox" type="radio" name="tabset" id="tab-{{ $service->id }}"
                        {{ $service->id === 1 ? 'checked' : '' }} autocomplete="off" />
                    <label class="testimonials__label" for="tab-{{ $service->id }}"
                        data-tab-path="tab-testimonials-{{ $service->id }}" data-tab-group="tab-testimonials">
                        <img src="{{ asset("resources-assets/svg/$service->logo") }}" alt="{{ $service->name }}" />
                        <span class="btn testimonials__number">{{ $service->pivot->rating_count }}
                            {{ \App\Helpers::getNumEnding((int) $service->rating_count, ['оценка', 'оценки', 'оценок']) }}</span>
                        <x-display-rating rating="{{ $service->pivot->rating }}" disabled={{ true }}
                            classMod="testimonials-service" />
                    </label>
                @endforeach
            </div>
        </div>
        <div class="testimonials__panels">
            @foreach ($shop->services as $service)
                <div class="{{ $service->id == 1 ? 'open' : '' }}"
                    data-tab-target="tab-testimonials-{{ $service->id }}" data-tab-group="tab-testimonials">
                    @include('layouts.comments-list', [
                        'service' => $service,
                        'filterID' => "comments_filter_$service->id",
                    ])
                </div>
            @endforeach
        </div>
        <div class="testimonials__list">
            @foreach ($shop->services as $service)
                <x-accordion id="testimonials-item-{{ $service->id }}" modification="testimonials">
                    <x-slot name="title">
                        <img class="testimonials__logo" src="{{ asset("resources-assets/svg/$service->logo") }}"
                            alt="{{ $service->name }}" />
                        <div class="testimonials__info">
                            <x-display-rating rating="{{ $service->pivot->rating }}" disabled={{ true }}
                                classMod="testimonials-service" />
                            <span class="btn testimonials__number">{{ $service->pivot->rating_count }}
                                {{ \App\Helpers::getNumEnding((int) $service->rating_count, ['оценка', 'оценки', 'оценок']) }}</span>
                        </div>
                    </x-slot>
                    @include('layouts.comments-list', [
                        'service' => $service,
                        'filterID' => "mobile_comments_filter_$service->id",
                    ])
                </x-accordion>
            @endforeach
        </div>
    </div>
</section>
