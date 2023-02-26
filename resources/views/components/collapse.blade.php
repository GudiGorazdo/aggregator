<button class="filters-subcategories_button"
  type="button"
  data-bs-toggle="collapse"
  data-bs-target="#{{ $target }}_collapse"
  aria-controls="{{ $controls }}_collapse"
  aria-expanded="false"
>
{{ $title }}
</button>
<div class="row">
<div class="col">
    <div class="collapse multi-collapse" id="{{ $controls }}_collapse">
        <div class="card card-body">
            {{ $slot }}
        </div>
    </div>
</div>
</div>
