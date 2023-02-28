<div id="filter_location">
  @include('filters.location-filter', [
      'items' => $items,
      'name' => 'area',
      'label' => 'Район',
      'city_id' => $city_id,
      'request' => $request,
      ])
  @include('filters.location-filter', [
      'items' => $items->pluck('subways')->flatten()->all(),
      'name' => 'subway',
      'label' => 'Метро',
      'city_id' => $city_id,
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
</div>
