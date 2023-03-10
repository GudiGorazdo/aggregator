{{--
  @param string $rating       -- рэйтинг
  @param string $decimal      -- колличество цифр после запятой, если не передано - 0
--}}

<div class="rating">
  @for ($i = 0; $i < 5; $i++)
      <i class="fa fa-star rating_star {{ $i < (int)$rating ? 'rating_star--gold' : '' }}"></i>
  @endfor
  @if(isset($decimal) && $decimal > 0)
    <span class="rating_count">{{ number_format($rating, +$decimal) }}</span>
  @elseif(isset($decimal) && +$decimal < 0)
    <span class="rating_count">{{ intval($rating) }}</span>
  @endif
</div>
