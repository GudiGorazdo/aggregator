@include('layouts.search.categories', [
    'modifier' => 'filter',
    'categories' => \App\Models\Category::with('subCategories')->get(),
    'inputID' => 'aside-search-categories',
    'inputName' => 'aside-search-categories',
    'categoriesListType' => 'form',
])
