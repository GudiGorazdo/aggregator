<ul id="shop_list" class="shop-list">
    @foreach ($shops as $shop)
        <li>
            <x-card className="shop-card">
                <div class="p-2 bg-white border rounded mt-2">
                    <div class="col-md-2 mt-1 d-flex">
                        <img class="shop-card_img img-fluid img-responsive rounded product-image me-3"
                            src="{{ $shop->photo . 'id/' . rand(1, 500) }}/100/100" alt="{{ $shop->logo }}">
                        <div class="col-md-4 mt-1">
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
                    <div class="col-md-6 mt-1">
                        <div class="mt-1 mb-1 spec-1">
                            {{ $shop->description }}
                            <span class="dot"><br></span>
                        </div>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center"></div>
                        <div class="d-flex flex-column mt-4">
                            <ul class="shop-card-socials d-flex mb-3">
                                <li class="shop-card-socials_item me-4"><a href="{{ $shop->telegram }}"><i class="fab fa-telegram"></i></a></li>
                                <li class="shop-card-socials_item me-4"><a href="{{ $shop->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                <li class="shop-card-socials_item me-4"><a href="tel:{{ $shop->phone }}"><i class="fa fa-phone"></i></a></li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-sm mt-2 p-2">Отправить заявку</a>
                        </div>
                    </div>
                </div>
            </x-card>
        </li>
    @endforeach
</ul>

{{-- <x-card className="shop-card">
    <div class="p-2 bg-white border rounded mt-2">
        <div class="col-md-2 mt-1 d-flex">
            <img class="img-fluid img-responsive rounded product-image"
                src="{{ $shop->photo . 'id/' . rand(1, 500) }}/100/100" alt="{{ $shop->logo }}">
            <div class="col-md-4 mt-1">
                <h5>{{ $shop->name }}</h5>
                <div class="d-flex flex-row">
                    <div class="ratings mr-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <span>{{ number_format($shop->average_rating, 2, ',') }}</span>
                </div>
                <div class="mt-1 mb-1 spec-1">
                    <span>{{ $shop->address }}</span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-1">
            <div class="mt-1 mb-1 spec-1">
                {{ $shop->description }}
                <span class="dot"><br></span>
            </div>
        </div>
        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
            <div class="d-flex flex-row align-items-center"></div>
            <div class="d-flex flex-column mt-4">
                <ul class="shop-card_socials-list d-flex">
                    <li><a href="{{ $shop->telegram }}"><i class="fab fa-telegram"></i></a></li>
                    <li><a href="{{ $shop->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a href="tel:{{ $shop->phone }}"><i class="fa fa-phone"></i></a></li>
                </ul>
                <a href="#" class="btn btn-outline-primary btn-sm mt-2">Отправить заявку</a>
            </div>
        </div>
    </div>
</x-card> --}}
