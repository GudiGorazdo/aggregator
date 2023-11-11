@foreach ($photos as $photo => $sizes)
    {{-- {{ dd($photo) }} --}}
    <li class="shop-photos_item">
        <label class="shop-photos_label">
            <x-picture :name="$photo" :sizes="$sizes" path="{{ 'storage/uploads/images/shops/' . $shop->id . '/' }}"
                alt="фото компании"></x-picture>
            <input type="checkbox" class="shop-photos_input" name="delete_photos[]" value="{{ $photo }}"
                autocomplete="off">
        </label>
    </li>
@endforeach
