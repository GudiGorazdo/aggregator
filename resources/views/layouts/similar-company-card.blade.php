<div class="similar-company-card">
    <div class="similar-company-card__img-box">
        <img class="similar-company-card__img" src="{{ asset('assets/img/item/card-photo.jpg') }}" alt="Фото компании" />
    </div>
    <div class="similar-company-card__info-box">
        <h3 class="similar-company-card__title"><a href="/shop/{{ $similar->id }}">{{ $similar->name }}</a></h3>
        <x-display-rating rating="{{ $similar->average_rating }}" disabled={{true}} shopID="{{ $similar->id }}" classMod="similar-company"/>
        <p class="similar-company-card__status">{{ \App\Services\TitleService::timeBeforeClose($similar, true) }}</p>
        <p class="similar-company-card__address">{{ $similar->address }}</p>
    </div>
</div>


