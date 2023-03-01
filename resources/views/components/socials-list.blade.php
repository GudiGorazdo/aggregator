<ul class="{{ $classNameList ?? '' }} d-flex">
    <li class="{{ $classNameItem }} me-2">
        <x-contact-telegram href="{{ $tg }}" />
    </li>
    <li class="{{ $classNameItem }} me-2">
        <x-contact-whatsapp href="{{ $whatsapp }}" />
    </li>
    <li class="{{ $classNameItem }}">
        <x-contact-phone href="tel:{{ $phone }}" />
    </li>
</ul>
