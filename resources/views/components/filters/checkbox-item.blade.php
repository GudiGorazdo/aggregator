<x-checkbox
    :line="true"
    :active="$active"
    :dataset="$dataset"
    id="{{ $id }}"
    value="{{ $value }}"
    name="{{ $filter }}[]"
>
    {{ $label }}
</x-checkbox>
