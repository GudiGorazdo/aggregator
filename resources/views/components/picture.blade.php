{{--
    Подразумевается, что есть два типа картинок(webp и jpg|png) с одним названием и srcset
    @param array $sizes = [
        'sm',
        'md',
        'lg'
    ];
    названя размеров должны соответствовать названию папки,
    имя картинки должно быть одинаковым для всех размеров, но путь должен быть разным
    основная картинка
    путь/до/картинки/имя.jpg
    картинка определенного размера
    путь/до/картинки/размер/имя.jpg

    @param string $name = имякартинки.jpg
--}}

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
        @foreach($sizes as $size)
            <source
                media="(max-width: {{ \App\Services\ImageService::SIZES[$size] }}px)"
                srcset="{{ asset($path . $size . '/' . $name) }}"
                type={{ \App\Services\ImageService::MIMES[explode('.', $name)[1]] }}
                loading="lazy"
            >
        @endforeach
    @endif
    <source
        srcset="{{ asset($path . explode('.', $name)[0] . '.webp') }}"
        type="image/webp"
        loading="lazy"
    >
    <source
        srcset="{{ asset($path . $name ) }}"
        type="{{ \App\Services\ImageService::MIMES[ strtolower( explode('.', $name)[1] ) ] }}"
        loading="lazy"
    >
    <img src="{{ asset($path . $name ) }}" alt="{{ $alt }}" loading="lazy">
</picture>
