<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

trait Filtrable
{
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
