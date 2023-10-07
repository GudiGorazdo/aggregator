<section id="service-responses-{{ $service->id }}" class="comments-list">
    <div class="comments-list__header">
        <div id="{{ $filterID }}" class="comments-list__filter"></div>
        <a href="{{ $service->link }}" class="btn comments-list__path">Перейти в карточку организации</a>
        <a href="{{ $service->link }}" class="btn comments-list__path comments-list__path--mobile">Карточка организации</a>
    </div>
    <div class="comments-list__container">
        @foreach(json_decode($service->pivot->comments) as $comment)
            @include('layouts.comment', ['comment' => $comment])
        @endforeach
    </div>
</section>


