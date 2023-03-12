<?php

namespace App\Filters;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

class SimilarCategoriesFilter extends BaseFilter
{
    private array $categories = [];

    public function __construct() {}

    public function apply(Builder $query, array $subCategories = []): Builder
    {
        $this->categories = $subCategories;
        if ($this->categories) {
            return $query->whereHas('subCategories', function (Builder $query) {
                return $query->whereIn('id', $this->categories);
            });
        }

        return $query;
    }
}
