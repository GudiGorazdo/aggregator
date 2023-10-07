<div class="similar-location">
    <div class="similar-location__list">
        @foreach (\App\Models\Area::getByCityID($cityID)->get() as $area)
        <a href="#">{{ $area->name }}</a>
        @endforeach
    </div>
    <button class="btn btn--more similar-location__more" data-button="district">
        Показать все
    </button>
</div>


