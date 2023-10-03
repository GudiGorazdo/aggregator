<fieldset class="star-rating{{ isset($disabled) ? ' disabled' : '' }}">
  <legend class="star-rating__caption">Рейтинг</legend>
  <div class="star-rating__group">
    @foreach ([
      '1' => 'Очень плохо',
      '2' => 'Плохо',
      '3' => 'Удовлетворительно',
      '4' => 'Хорошо',
      '5' => 'Отлично'
    ] as $key => $value)<input
        class="star-rating__radio"
        type="radio"
        {{ isset($disabled) ? ''  : "name='rating'" . (isset($name) ? "_$name" : '') }}
        value="{{ (integer)$key }}"
        {{ (integer)$key == number_format((integer)$rating, 0, '') ? 'checked' : '' }}
        autocomplete="off"
        aria-label="{{ $value }}"
      >@endforeach
  </div>
</fieldset>


