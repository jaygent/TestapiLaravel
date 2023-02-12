<?php

namespace App\customFilter;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterStructure implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {
            foreach ($value as $key => $value) {
                $query->whereJsonContains('structure->'.$key, $value);
            }
    }
}
