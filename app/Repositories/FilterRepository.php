<?php

namespace App\Repositories;

use App\Models\Filter;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use PhpParser\Node\Scalar\String_;

class FilterRepository implements FilterRepositoryInterface
{
    private const DEFAULT_AMOUNT_FILTERS = 10;
    public function getAllFilters()
    {
        return Filter::paginate(self::DEFAULT_AMOUNT_FILTERS);
    }

    public function getAllFeatures()
    {
        return Filter::where('type', 'feature')->get();
    }

    public function findFeatures(array $features)
    {
        return Filter::whereIn('title', $features)->get();
    }
    public function findCity( $city)
    {
        return Filter::whereIn('title', $city)->get();
    }
    public function findGender( $gender)
    {
        return Filter::whereIn('title', $gender)->get();
    }

    public function createFilter(array $fields)
    {
        Filter::create($fields);
    }

    public function updateFilter(Filter $filter, array $fields)
    {
        $filter->update($fields);
    }

    public function deleteFilter(Filter $filter)
    {
        $filter->delete();
    }
}
