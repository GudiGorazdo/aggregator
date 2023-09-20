@php
    if (isset($params)) $cityID = $params ?? null;
    else $cityID = $request['city'] ?? \App\Http\Controllers\CookieController::getCookie(\App\Constants\CookieConstants::LOCATION) ?? null;
    $items = $filter->getItems(+$cityID);
    var_dump($cityID);
@endphp
@include('filters.location-filter', [
    'items' => $items,
    'name' => 'area',
    'label' => 'Район',
    'city_id' => $cityID,
    'request' => $request,
    ])
@include('filters.location-filter', [
    'items' => $items->pluck('subways')->flatten()->all(),
    'name' => 'subway',
    'label' => 'Метро',
    'city_id' => $cityID,
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
