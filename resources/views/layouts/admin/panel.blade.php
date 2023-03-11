<div class="admin-panel">
    <div class="container admin-panel_wrapper">
        <div class="admin-panel-search">
            <form action="#" class="admin-panel-search_form">
                @csrf
                <x-input
                    classNamesWrapper="admin-panel-search_input"
                    inputId="search"
                    name="search"
                    type="text"
                    placeholder="поиск по названию"
                />
                <div id="search_loader" class="admin-panel-search_loader" hidden>
                    <img src="{{ asset('assets/images/Loading_white.gif') }}" alt="">
                </div>
                {{-- <x-button-site id="search_button">Искать</x-button-site> --}}
            </form>
            <ul id="search_list" class="admin-panel-search_list" hidden></ul>
        </div>
    </div>
</div>
