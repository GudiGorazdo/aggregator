<div class="rating">
  @for ($i = 0; $i < 5; $i++)
      <i class="fa fa-star rating_star {{ $i < (int)$rating ? 'rating_star--gold' : '' }}"></i>
  @endfor
  <span class="rating_count">{{ number_format($rating, 2, ',') }}</span>
</div>
