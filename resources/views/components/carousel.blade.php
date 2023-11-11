<div class="swiper{{ isset($classMod) ? ' swiper--' . $classMod : '' }}">
    <div class="swiper-wrapper{{ isset($classMod) ? ' swiper-wrapper--' . $classMod : '' }}">
        {{ $slot }}
    </div>

    {{ $navigation ?? '' }}
</div>
