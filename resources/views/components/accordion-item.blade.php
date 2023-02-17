<div class="accordion-item">
    <h2 class="accordion-header" id="item_{{ $id }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapse }}" aria-expanded="false" aria-controls="{{ $collapse }}">
            {{ $slot }}
        </button>
    </h2>
    <div id="{{ $collapse }}" class="multi-collapse collapse">
        <div class="accordion-body">
            @foreach ($subcategories as $sc)
                <x-checkbox id="sub_category_{{ $sc->id }}" value="{{ $sc->id }}">{{ $sc->name }}</x-checkbox>
            @endforeach
        </div>
    </div>
</div>
