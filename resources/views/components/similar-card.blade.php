<x-card className="similar-card">
    <div class="p-2 bg-white rounded mt-2">
        <div class="mt-1 d-flex align-items-center mb-2">
            <img class="similar-card_img img-fluid img-responsive rounded product-image me-3" src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100" alt="логотип магазина {{ $shop->name }}">
            <div class="mt-1">
                <h5 class="similar-card_title">{{ $shop->name }}</h5>
                <div class="d-flex flex-row">
                   <x-star-rating-display rating="{{ $shop->average_rating }}" decimal='1'/>
                </div>
                <div class="mt-1 mb-1 spec-1 similar-card_address">
                    <h6 class="mb-1">{{ $shop->address }}</h6>
                    @if(!empty($shop->subways->toArray()))
                        <h6 class="similar-card_subtitle mb-1">Ближашие станции метро:</h6>
                        <p class="similar-card_subways mb-0">
                            @foreach($shop->subways as $subway)
                                @if ($subway !== $shop->subways->last())
                                    {{ $subway->name }},
                                @else
                                    {{ $subway->name }}.
                                @endif
                            @endforeach
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <p class="similar-card_categories mb-0">
            @foreach($shop->categories as $category)
                @if ($category !== $shop->categories->last())
                    {{ $category->name }},
                @else
                    {{ $category->name }}.
                @endif
            @endforeach
        </p>
    </div>
    <a class="similar-card_link" href="{{ route('shop', ['id' => $shop->id]) }}"></a>
</x-card>
