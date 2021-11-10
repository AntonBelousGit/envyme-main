<?php


namespace App\Repositories\Interfaces;
use App\Models\Filter;

interface FilterRepositoryInterface
{
    public function getAllFeatures();
    public function createFilter(array $fields);
    public function updateFilter(Filter $filter, array $fields);
    public function deleteFilter(Filter $filter);
    public function getAllFilters();
    public function findFeatures(array $feature);
}