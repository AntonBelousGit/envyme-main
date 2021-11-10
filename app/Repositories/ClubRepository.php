<?php


namespace App\Repositories;


use App\Models\Club;
use App\Repositories\Interfaces\ClubRepositoryInterface;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Repositories\Interfaces\RaitingRepositoryInterface;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class ClubRepository implements ClubRepositoryInterface
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

    public function getPaginatedTicket(?string $city)
    {
        $clubs = Club::query();

        if(!is_null($city)){
            $clubs = Club::whereHas('filters', function($q) use($city){
                return $q->where('title', $city);
            });

        }

        return $clubs->paginate(8);
    }

    public function getPaginatedTicketTitle(?string $city)
    {
        $clubs = Club::query();

        if(!is_null($city)){
            return Club::where('title', 'like','%'.$city.'%')->paginate(8);
        }

        return $clubs->paginate(8);
    }

    public function createClub(array $fields)
    {
        $club = new Club;
        $club->fill($fields);
        $club->schedule = $fields['from_time'] . '-' . $fields['to_time'];
        $club->save();
        return $club;
    }

    public function getAllClubs()
    {
        return Club::paginate(self::DEFAULT_AMOUNT_PAGINATE);
    }

    public function updateClub(Club $club, array $fields)
    {
        $club->update($fields);
        $club->schedule = $fields['from_time'] . '-' . $fields['to_time'];
        if(isset($fields['photos']))
        {

            $club->photos = array_merge_recursive($fields['gallery'],$fields['photos']);
//            $club->photos = [$fields['gallery'] , $fields['photos']];

//            dd($club->photos);

        }
        $club->save();
        return $club;
    }

    public function deleteClub(Club $club)
    {
        $club->delete();
    }

    public function deletePhoto(string $filename)
    {
        $club = Club::whereRaw('json_contains(photos, \'["' . $filename . '"]\')')->first();
//        $club = Club::whereRaw('photos', $filename)->first();
//        dd($club);

        $photos = $club->photos;
        $search_index = -1;
        foreach($photos as $idx => $photo)
        {
            if($photo === $filename)
            {
                $search_index = $idx;
                break;
            }
        }
        unset($photos[$search_index]);
        $club->photos = $photos;
        $club->save();
    }

    public function getCountOfClubs()
    {
        return Club::count();
    }
}
