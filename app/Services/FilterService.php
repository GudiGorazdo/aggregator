<?php

namespace App\Services;

class FilterService
{
    protected array $filters = [];

    public function registerFilters(array $filters): void
    {
        $this->filters = $filters;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getFilterByName($name)
    {
        return $this->filters[$name] ?? false;
    }
}
