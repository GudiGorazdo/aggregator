<nav id="colorlib-main-menu" class="nav-menu_nav" role="navigation">
    <ul class="nav-menu_list">
        @foreach ($items as $link)
            <li class="nav-menu_item">
                <x-nav-link href="{{ $link['href'] }}">{{ $link['title'] }}</x-nav-link>
            </li>
        @endforeach
    </ul>
</nav>

