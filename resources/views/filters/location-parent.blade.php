<x-accordion
  className="aside-filters-{{ $name }}"
  id="filter_{{ $name }}"
  >
    <x-accordion-item
        id="filter_{{ $name }}_inner"
        className="aside-filters-{{ $name }}_item"
        buttonId="filter_{{ $name }}_button"
        collapse="coolapse_filter_{{ $name }}_inner"
        title="{{ $label }}"
        bodyId="filter_{{ $name }}_body"
        disabled="{{ count($items) > 0 ? false : true }}"
    >
        @if ($id)
            @foreach ($items as $item)
                @include('filters.checkbox-item', ['name' => $name, 'item' => $item, 'request' => $request])
            @endforeach
        @endif
    </x-accordion-item>
</x-accordion>
