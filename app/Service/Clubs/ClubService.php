<?php


namespace App\Service\Clubs;

use App\Service\Photo\PhotoService;
use App\Models\Club;
use App\Repositories\Interfaces\ClubRepositoryInterface;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\RaitingRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Auth;

class ClubService
{
    private const TEST_USER_ID = 2;
    private $clubRepository;
    private $filterRepository;
    private $ticketRepository;
    private $photoService;

    public function __construct(
        ClubRepositoryInterface $clubRepository,
        PhotoService $photoService,
        FilterRepositoryInterface $filterRepository,
        TicketRepositoryInterface $ticketRepository,
        RaitingRepositoryInterface $raitingRepository
        )
    {
        $this->clubRepository = $clubRepository;
        $this->photoService = $photoService;
        $this->filterRepository = $filterRepository;
        $this->ticketRepository = $ticketRepository;
        $this->raitingRepository = $raitingRepository;
        $this->userRepository = new UserRepository();
    }

    public function createClub(array $fields)
    {
        $club = $this->clubRepository->createClub($fields);
        if(isset($fields['features'])){
            $this->selectFeatures($club, $fields['features']);
        }
        if(isset($fields['city'])){
            $this->selectCity($club, $fields['city']);
        }
        $this->raitingRepository->create([
            'raiting' => 0.0,
            'user' => $this->userRepository->findUser(self::TEST_USER_ID),
            'club' => $club
        ]);

        $fields['price'] = $fields['price'] - ($fields['price']*($fields['discount']/100));

        $ticket = $this->ticketRepository->createTicket($fields);
        $club->tickets()->save($ticket);
    }

    public function getAllClubs()
    {
        return $this->clubRepository->getAllClubs();
    }

    public function updateClub(Club $club, array $fields)
    {
        $club_updated = $this->clubRepository->updateClub($club, $fields);
        $ticket = null;
        if(isset($fields['features']))
        {
            $this->selectFeatures($club_updated, $fields['features']);
        }
        if (isset($fields['city'])){
            $this->selectCity($club_updated, $fields['city']);
        }
        if(count($club_updated->tickets) === 0)
        {
            $fields['price'] = $fields['price'] - ($fields['price']*($fields['discount']/100));

            $ticket = $this->ticketRepository->createTicket($fields);
            $club_updated->tickets()->save($ticket);
        }
        else
        {

            foreach($club_updated->tickets as $ticket)
            {
                $fields['price'] = $fields['price'] - ($fields['price']*($fields['discount']/100));

                $this->ticketRepository->updateTicket($ticket, [
                    'price' => $fields['price'],
                    'club_id' => $club_updated
                ]);
            }
        }

    }

    public function deleteClub(Club $club)
    {
        return $this->clubRepository->deleteClub($club);
    }

    public function getAllFeatures()
    {
        return $this->filterRepository->getAllFeatures();
    }

    public function getCountOfClubs()
    {
        return $this->clubRepository->getCountOfClubs();
    }

    public function addPhoto(Request $request)
    {
        return $this->photoService->addPhoto($request);
    }

    public function deletePhoto(string $fileName)
    {
        $this->clubRepository->deletePhoto($fileName);
        return $this->photoService->deletePhoto($fileName);
    }

    private function selectFeatures(Club $club, array $features)
    {
        $features = $this->filterRepository->findFeatures($features);
        $club->filters()->sync([]);
        foreach($features as $feature){
            $club->filters()->attach($feature);
        }
    }
    private function selectCity(Club $club, $city)
    {
        $features = $this->filterRepository->findCity($city);
        $club->filters()->sync([]);
        foreach($features as $city){
            $club->filters()->attach($city);
        }
    }
}
