<?php

namespace App\Filters;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;


class RatingFilter extends BaseFilter
{
    public function apply(Builder $query): Builder
    {
        $value = $this->request[$this->name] ?? '3';
        if (!$value) return $query;
        if (is_string($value)) $query = $query->where($this->field, '>=', $value);
        return $query;
    }
}
