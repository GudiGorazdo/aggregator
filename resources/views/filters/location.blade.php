@foreach ([
  'area' => 'Район',
  'subway' => 'Метро',
] as $filter => $name)
<x-accordion className="aside-filters-{{ $filter }}" id="filter_{{ $filter }}">
  <x-accordion-item
      id="filter_{{ $filter }}_inner"
      className="aside-filters-{{ $filter }}_item"
      buttonId="ilter_{{ $filter }}_button"
      collapse="coolapse_filter_{{ $filter }}_inner"
      title="{{ $name }}"
      bodyId="filter_{{ $filter }}_body"
      disabled="{{ true }}"
  ></x-accordion-item>
</x-accordion>
@endforeach
