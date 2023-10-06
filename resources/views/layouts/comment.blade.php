<div class="comment">
    <div class="comment__header">
        <div class="comment__photo">
            <img src="{{ asset('assets/img/item/customer-photo.jpg') }}" alt="Фото автора отзыва" />
        </div>
        <div class="comment__info">
            <p class="comment__name">{{ $comment->name }}</p>
            <p class="comment__date">
                {{ $comment->date }}
            </p>
        </div>
    </div>
    <p class="comment__text">
        {{ $comment->text }}
    </p>
    @if($comment->response > [])
        <div class="comment__reply">
            <p class="comment__reply-date">
                Ответ от {{ $comment->response->date }}
            </p>
            <p class="comment__reply-text">
                {{ $comment->response->text }}
            </p>
        </div>
    @endif
</div>


