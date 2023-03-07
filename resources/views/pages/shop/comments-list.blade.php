<section class="reviews">
    <h3 class="title text-center">Отзывы</h3>
    <x-accordion className="reviews_accordion" id="reviews">
        @foreach ($services as $service)
            <x-accordion-item
                id="reviews_inner"
                className="reviews_item"
                bodyClassName="reviews_body"
                collapse="reviews_service-{{ $service['id'] }}"
                parent="reviews"
            >
                <x-slot name="title">
                    <span class="reviews_service-name">{{ $service['name'] }}</span>
                    <p class="reviews_rating-count rating-count reviews_rating-count--mobile">
                        <i class="fa fa-star rating_star rating_star--gold"></i>
                        {{ +$service['rating'] }}
                    </p>
                    <div class="reviews_rating-count reviews_rating-count--desktop">
                        <x-star-rating-display rating="{{ +$service['rating'] }}" />
                    </div>
                    <span class="reviews_count">({{ $service['comments_count_title'] }})</span>
                </x-slot>
                <p class="reviews_subtitle text-center">
                    Все актуальные отзывы можно просмотреть в
                    <a class="reviews_link" href="{{ $service['link']}}">карточке организации</a>
                </p>
                <ul class="reviews_list">
                    @foreach ($service['comments'] as $comment)
                        <li class="reviews_comment">
                            <div class="d-flex">
                                <p class="reviews_name">{{ $comment->name }}</p>
                                <p class="reviews_rating-count rating-count reviews_rating-count--mobile">
                                    <i class="fa fa-star rating_star rating_star--gold"></i>
                                    {{ +$comment->rating }}
                                </p>
                                <div class="reviews_rating-count reviews_rating-count--desktop">
                                    <x-star-rating-display rating="{{ +$comment->rating }}" />
                                </div>
                                <p class="reviews_date">{{ $comment->date }}</p>
                            </div>
                            <p class="reviews_text">{{ $comment->text }}</p>
                            @if (!empty($comment->response))
                                <x-collapse
                                    classNameButton="reviews_response collapsed btn-link"
                                    target="comment_{{ $comment->date }}_{{ $comment->name }}"
                                    controls="comment_{{ $comment->date }}_{{ $comment->name }}"
                                    title="({{ count($comment->response) }})"
                                >
                                    <ul class="reviews_sublist">
                                        @foreach ($comment->response as $response)
                                            <li class="reviews_subcomment">
                                                <div class="d-flex">
                                                    <p class="reviews_name">{{ $comment->name }}</p>
                                                    <p class="reviews_date">{{ $comment->date }}</p>
                                                </div>
                                                <p class="reviews_text">{{ $comment->text }}</p>
                                                <span class="shadow-line"></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </x-collapse>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </x-accordion-item>
        @endforeach
    </x-accordion>
</section>
