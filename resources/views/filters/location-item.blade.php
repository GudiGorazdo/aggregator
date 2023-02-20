<x-checkbox
    id="{{ $filter->getName() }}_{{ $item->id }}"
    value="{{ $item->id }}"
    name="{{ $filter->getName() }}[]"
    line="{{ true }}"
    active="{{ isset($request[$filter->getName()]) && in_array($item->id, $request[$filter->getName()]) }}"
>
    {{ $item->name }}
</x-checkbox>

