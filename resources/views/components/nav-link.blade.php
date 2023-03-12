<a
  class="nav-menu_link{{ Request::is($href) ? ' colorlib-active' : '' }}"
  href="{{ $href }}"
>
  {{ $slot }}
</a>
