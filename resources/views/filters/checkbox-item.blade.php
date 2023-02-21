@php
    $dataSet = false;
    if (isset($groups)) {
        $dataSet = \App\Services\Helper::getDataSet($groups, $item[$groupField]);
    }
@endphp
<x-checkbox
    id="{{ $name }}_{{ $item->id }}"
    value="{{ $item->id }}"
    name="{{ $name }}[]"
    line="{{ true }}"
    active="{{ isset($request[$name]) && in_array($item->id, $request[$name]) }}"
    dataSet="{{ $dataSet }}"
>
    {{ $item->name }}
</x-checkbox>
