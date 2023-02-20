@foreach (\App\Models\Area::getByCityId($params)->get() as $item)
  @include('filters.location-item')
@endforeach

