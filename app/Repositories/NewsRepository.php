<?php


namespace App\Repositories;


use App\Models\News;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Repositories\Interfaces\RaitingRepositoryInterface;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class NewsRepository
{
    private const DEFAULT_AMOUNT_PAGINATE = 8;
    private $filterRepository;
    private $raitingRepository;
    private $userRepository;

    public function __construct(
        FilterRepositoryInterface $filterRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->filterRepository = $filterRepository;
        $this->userRepository = $userRepository;
    }

    public function getPaginatedNewsTitle(?string $city)
    {
        $clubs = News::query();

        if (!is_null($city)) {
            return News::where('title', 'like', '%' . $city . '%')->paginate(10);
        }

        return $clubs->paginate(10);
    }
}
