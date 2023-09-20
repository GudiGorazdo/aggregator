<div class="similar-regions">
    <div class="similar-regions__list">
        @foreach (\App\Models\Area::getByCityID($cityID)->get() as $area)
        <a href="#">{{ $area->name }}</a>
        @endforeach
    </div>
    <button class="btn similar__more-btn regions__expand" data-button="district">
        Показать все
    </button>
</div>

