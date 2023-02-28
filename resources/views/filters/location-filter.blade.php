<x-accordion
  className="filters-{{ $name }}"
  id="filter_{{ $name }}"
>
    <x-accordion-item
        id="filter_{{ $name }}_inner"
        className="filters-{{ $name }}_item"
        buttonId="filter_{{ $name }}_button"
        collapse="collapse_filter_{{ $name }}_inner"
        title="{{ $label }}"
        bodyId="filter_{{ $name }}_body"
        show="{{ isset($request[$name]) ? 'true' : 'false' }}"
        disabled="{{ count($items) > 0 ? false : true }}"
    >
        @if ($city_id)
            @foreach ($items as $item)
                <x-checkbox-item
                    :item="$item"
                    :filter="$name"
                    :request="$request"
                    :groups="$groups ?? []"
                    :groupfield="$groupField ?? ''"
                />
            @endforeach
        @endif
    </x-accordion-item>
</x-accordion>
