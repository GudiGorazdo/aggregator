<ul id="shop_list" class="shop-list">
    <input type="hidden" name="city_coord" value="{{ $shops[0]->city['coord']}}">
    @foreach ($shops as $shop)
        <li>
            <x-card className="shop-card mb-4">
                <input type="hidden" name="shop_coord" value={{ $shop->coord }}>
                <div class="p-2 bg-white rounded mt-2">
                    <div class="mt-1 d-flex">
                        <img class="shop-card_img img-fluid img-responsive rounded product-image me-3"
                            src="{{ $shop->photo . 'id/' . rand(1, 500) }}/100/100" alt="{{ $shop->logo }}">
                        <div class="mt-1">
                            <h5 class="shop-card_title">{{ $shop->name }}</h5>
                            <div class="d-flex flex-row">
                                <div class="rating mr-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star rating_star {{ $i < (int)$shop->average_rating ? 'rating_star--gold' : '' }}"></i>
                                    @endfor
                                    <span class="rating_count">{{ number_format($shop->average_rating, 2, ',') }}</span>
                                </div>
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
                        <ul class="shop-card-socials d-flex">
                            <li class="shop-card-socials_item me-2">
                                <x-contact-telegram href="{{ $shop->telegram }}"/>
                            </li>
                            <li class="shop-card-socials_item me-2">
                                <x-contact-whatsapp href="{{ $shop->whatsapp }}"/>
                            </li>
                            <li class="shop-card-socials_item me-2">
                                <x-contact-phone href="tel:{{ $shop->phone }}"/>
                            </li>
                        </ul>
                        <x-button-primary-link class="btn-sm p-2" href="#">Отправить заявку</x-button-link>
                    </div>
                </div>
            </x-card>
        </li>
    @endforeach
</ul>
