<div class="shop-card card">
  <div class="shop-card_header">
    <div class="shop-card_logo">
      <img src="{{ $shop->photo . 'id/' . rand(1, 500) }}/100/100" alt="{{ $shop->logo }}">
    </div>
    <div class="shop-card_info">
      <h3 class="shop-card_title">{{ $shop->name }}</h3>
      <div class="shop-card_rating"></div>
      <p class="shop-card_address">{{ $shop->address }}</p>
      <p class="shop-card_open"></p>
    </div>
    <p class="shop-card_description">{{ $shop->description }}</p>
    <ul class="shop-card_contacts-list">
      <li class="shop-card_contact shop-card_contact--telegram">{{ $shop->telegram }}</li>
      <li class="shop-card_contact shop-card_contact--whatsapp">{{ $shop->whatsapp }}</li>
      <li class="shop-card_contact shop-card_contact--phone">{{ $shop->phone }}</li>
      <li class="shop-card_contact shop-card_contact--bid">Отправить заявку</li>
    </ul>
  </div>
</div>
