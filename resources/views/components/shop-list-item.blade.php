<x-card className="shop-card">
  <div class="p-2 bg-white border rounded mt-2">
    <div class="col-md-2 mt-1 d-flex">
      <img class="img-fluid img-responsive rounded product-image" src="{{ $shop->photo . 'id/' . rand(1, 500) }}/100/100" alt="{{ $shop->logo }}">
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
        <div class="d-flex flex-row align-items-center">
        </div>
        <div class="d-flex flex-column mt-4">
          <ul class="shop-card_socials-list d-flex">
            <li><a href="#"><i class="fab fa-telegram"></i></a></li>
            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="#"><i class="fa fa-phone"></i></a></li>
          </ul>
          <a href="#" class="btn btn-outline-primary btn-sm mt-2">Отправить заявку</a>
        </div>
    </div>
</div>
</x-card>
