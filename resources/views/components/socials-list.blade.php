<ul class="{{ $classNameList ?? '' }} d-flex">
    @if($tg)
        <li class="{{ $classNameItem }}">
            <x-contact-telegram href="tg://{{ $tg }}" />
              @if (isset($edit) && $edit)
                  <x-input
                      classNamesWrapper="mb-3"
                      inputId="tg_input"
                      name="tg"
                      label=""
                      type="text"
                      value="{{ $tg }}"
                  />
              @endif
        </li>
    @endif
    @if($whatsapp)
        <li class="{{ $classNameItem }}">
            <x-contact-whatsapp href="https://api.whatsapp.com/send?phone={{ $whatsapp }}" />
                @if (isset($edit) && $edit)
                  <x-input
                      classNamesWrapper="mb-3"
                      inputId="whatsapp_input"
                      name="whatsapp"
                      label=""
                      type="text"
                      value="{{ $whatsapp }}"
                  />
              @endif

        </li>
    @endif
    @if($phone)
        <li class="{{ $classNameItem }}">
            <x-contact-phone href="tel:{{ $phone }}" />
                @if (isset($edit) && $edit)
                  <x-input
                      classNamesWrapper="mb-3"
                      inputId="phone_input"
                      name="phone"
                      label=""
                      type="text"
                      value="{{ $phone }}"
                  />
              @endif

        </li>
    @endif
</ul>
