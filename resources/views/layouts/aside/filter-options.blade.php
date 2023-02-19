@foreach ([
  'work_now' => 'Работает сейчас',
  'convenience_shop' => 'Круглосуточно',
  'is_pawnshop' => 'Ломбард',
  'appraisal_online' => 'Онлайн оценка',
] as $filter => $name)
  <x-checkbox
      id="{{ $filter }}"
      name="{{ $filter }}"
      value="on"
      line="{{ true }}"
      active="{{ $requestData[$filter] ?? false }}"
  >
      {{ $name }}
  </x-checkbox>
@endforeach
