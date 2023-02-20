{{-- {{var_dump($items)}} --}}
<x-accordion
  className="aside-filters-{{ $filter->getName() }}"
  id="filter_{{ $filter->getName() }}"
  >
    <x-accordion-item
        id="filter_{{ $filter->getName() }}_inner"
        className="aside-filters-{{ $filter->getName() }}_item"
        buttonId="ilter_{{ $filter->getName() }}_button"
        collapse="coolapse_filter_{{ $filter->getName() }}_inner"
        title="{{ $filter->getLabel() }}"
        bodyId="filter_{{ $filter->getName() }}_body"
        disabled="{{ $id ? true : false }}"
    >
        @if ($id)
            @include('filters.location-item')
        @endif
    </x-accordion-item>
</x-accordion>
