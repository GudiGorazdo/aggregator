<?php
function seedShopSubCategories(): void
{
    $shops = \App\Models\Shop::with('categories')->get();
    foreach ($shops as $shop) {
        foreach ($shop->categories as $category) {
            $subCategoryIds = \App\Models\SubCategory::where('category_id', $category->id)
                ->inRandomOrder()
                ->limit(rand(1, 15))
                ->pluck('id')
                ->toArray();

            if (!empty($subCategoryIds)) {
                $shop->subcategories()->syncWithoutDetaching($subCategoryIds);
            }
        }
    }
}
