<picture>
    @if(!empty($sizes))
        @foreach($sizes as $size)
            <source
                media="(max-width: {{ \App\Services\ImageService::SIZES[$size] }}px)"
                srcset="{{ asset($path . $size . '/' . explode('.', $name)[0] . '.webp') }}"
                type="image/webp"
                loading="lazy"
            >
        @endforeach
    @endif
    <source srcset="{{ asset($path . explode('.', $name)[0] . '.webp') }}" type="image/webp" loading="lazy">
    <source srcset="{{ asset($path . $name ) }}" type="image/jpeg" loading="lazy">
    <img src="{{ asset($path . $name ) }}" alt="{{ $alt }}" loading="lazy">
  </picture>
