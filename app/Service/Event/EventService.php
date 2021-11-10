<?php

namespace App\Service\Event;

use App\Models\Event;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Repositories\UserRepository;
use App\Service\Photo\PhotoService;

class EventService {

    private const TEST_USER_ID = 2;
    private $clubRepository;
    private $filterRepository;
    private $ticketRepository;
    private $photoService;

    public function __construct(

        FilterRepositoryInterface $filterRepository
    )
    {
        $this->filterRepository = $filterRepository;
    }

    public function selectFeatures(Event $event, $features)
    {
        $features = $this->filterRepository->findGender($features);
        $event->filters()->sync([]);
        foreach($features as $feature){
            $event->filters()->attach($feature);
        }
    }
}
