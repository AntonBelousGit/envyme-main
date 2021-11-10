<?php


namespace App\Service\Filter;

use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Models\Filter;
use App\Repositories\FilterRepository;
use Illuminate\Http\Request;

class FilterService
{
    private $filterRepository;
    public function __construct(FilterRepositoryInterface $filterRepository)
    {
        $this->filterRepository = $filterRepository;
    }

    public function getAllFilters()
    {
        return $this->filterRepository->getAllFilters();
    }

    public function updateFilter(Filter $filter, array $fields)
    {
        return $this->filterRepository->updateFilter($filter, $fields);
    }

    public function createFilter(array $fields)
    {
        return $this->filterRepository->createFilter($fields);
    }

    public function deleteFilter(Filter $filter)
    {
        return $this->filterRepository->deleteFilter($filter);
    }
}