@foreach ($shops as $shop)
    <li>
        @include('layouts.shop-card', ['shop' => $shop])
    </li>
@endforeach

<button class="btn shop-list__more" data-state="close">
    <span>Показать еще</span>
</button>
