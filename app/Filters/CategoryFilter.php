<?php

namespace App\Filters;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends BaseFilter
{
    private array $categories = [];

    public function apply(Builder $query): Builder
    {
        $this->categories = $this->request['sub_categories'] ?? [];
        if ($this->categories) {
            return $query->whereHas('subCategories', function (Builder $query) {
                return $query->whereIn('id', $this->categories);
            });
        }

        return $query;
    }
}
