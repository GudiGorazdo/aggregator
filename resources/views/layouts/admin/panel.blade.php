<div class="admin-panel">
    <div class="container admin-panel_wrapper">
        <form action="#" class="admin-panel_search">
            @csrf
            <x-input
                classNamesWrapper="admin-panel-search_input"
                inputId="search"
                name="search"
                label="Поиск по названию"
                type="text"
            />
        </form>
    </div>
</div>
