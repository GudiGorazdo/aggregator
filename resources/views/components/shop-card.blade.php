<x-card className="shop-card">
    <input type="hidden" name="shop_coord" value={{ $shop->coord }} data-shop-path={{ $shop->id }}>
    <div class="p-2 bg-white rounded mt-2">
        <div class="mt-1 d-flex">
            <img class="shop-card_img img-fluid img-responsive rounded product-image me-3" src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100" alt="логотип магазина {{ $shop->name }}">
            <div class="mt-1">
                <h5 class="shop-card_title"><a href="{{ route('shop', ['id' => $shop->id]) }}">{{ $shop->name }}</a></h5>
                <div class="d-flex flex-row">
                   <x-star-rating-display rating="{{ $shop->average_rating }}"/>
                </div>
                <div class="mt-1 mb-1 spec-1">
                    <span>{{ $shop->address }}</span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
        <div class="mt-1">
            <div class="mt-1 mb-1 spec-1">
                {{ $shop->description }}
                <span class="dot"><br></span>
            </div>
        </div>
        <div class="d-flex align-items-center mt-4">
            <x-socials-list
                classNameList="shop-card-socials"
                classNameItem="shop-card-socials_item"
                tg="{{ $shop->telegram }}"
                whatsapp="{{ $shop->whatsapp }}"
                phone="{{ $shop->phone }}"
            />
            <x-button-primary-link class="btn-sm p-2 ms-2" href="#">Отправить заявку</x-button-primary-link>
            <a class="more-details" href="{{ route('shop', ['id' => $shop->id]) }}">Детальнее &#8594;</a>
        </div>
    </div>
</x-card>
