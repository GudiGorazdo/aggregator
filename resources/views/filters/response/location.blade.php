@php
    if (isset($params)) $id = $params ?? null;
    else if (isset($request['city'])) $id = $request['city'] ?? null;
    $items = $filter->getItems(+$id);
@endphp
@include('filters.location-parent', [
    'items' => $items,
    'name' => 'area',
    'label' => 'Район',
    'id' => $id,
    'request' => $request,
    ])
@include('filters.location-parent', [
    'items' => $items->pluck('subways')->flatten()->all(),
    'name' => 'subway',
    'label' => 'Метро',
    'id' => $id,
    'request' => $request,
    'groupField' => 'area_id',
    'groups' => [
        [
            'name' => 'area',
            'type' => 'target',
            'value_prefix' => 'area_',
        ]
    ]
])
