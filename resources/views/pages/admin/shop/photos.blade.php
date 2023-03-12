@foreach ($photos as $photo)
    <li class="shop-photos_item">
        <label class="shop-photos_label">
            <img class="preview_img" src="{{ $photo . '/id/' . rand(10, 100) }}/150/150" alt="фото компании {{ $shop->name }}">
            <input type="checkbox" class="shop-photos_input" checked name="update_photos[]" value="{{ $photo }}" autocomplete="off">
        </label>
    </li>
@endforeach
