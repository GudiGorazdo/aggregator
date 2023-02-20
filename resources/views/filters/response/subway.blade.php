@foreach (\App\Models\Subway::getByAreasIds($params)->get() as $item)
  @include('filters.location-item')
@endforeach

