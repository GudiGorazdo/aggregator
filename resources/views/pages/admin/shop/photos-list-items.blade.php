@foreach ($photos as $photo)
    <li class="shop-photos_item">
        <label class="shop-photos_label">
            <x-picture
                :name="$photo->name"
                :sizes="$photo->sizes"
                path="{{ 'storage/uploads/images/shops/' . $shop->id . '/'}}"
                alt="фото компании"
            ></x-picture>
            <input type="checkbox" class="shop-photos_input" checked name="update_photos[]" value="{{ $photo->name || '' }}" autocomplete="off">
        </label>
    </li>
@endforeach
