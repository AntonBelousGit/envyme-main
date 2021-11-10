<?php


namespace App\Repositories;


use App\Models\Club;
use App\Models\Event;
use App\Repositories\Interfaces\ClubRepositoryInterface;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Repositories\Interfaces\RaitingRepositoryInterface;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class EventRepository implements ClubRepositoryInterface
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

    public function getPaginatedPackagesCity(?string $city)
    {
        $clubs = Event::query()->where('type', 'package');

        if(!is_null($city)){
            if(app()->isLocale('en')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title', $city);
                });
            }
            elseif(app()->isLocale('ru')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title_ru', $city);
                });
            }
            elseif(app()->isLocale('fi')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title_fi', $city);
                });
            }
            elseif(app()->isLocale('et')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title_et', $city);
                });
            }
        }

        return $clubs->paginate(8);
    }
    public function getPaginatedPackagesGender(?string $city)
    {
//       dd($city);
        $clubs = Event::query()->where('type', 'package');

        if(!is_null($city)){
            if(app()->isLocale('en')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title', $city);
                });
            }
            elseif(app()->isLocale('ru')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title_ru', $city);
                });
            }
            elseif(app()->isLocale('fi')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title_fi', $city);
                });
            }
            elseif(app()->isLocale('et')){
                $clubs = Event::where('type', 'package')->whereHas('filters', function($q) use($city){
                    return $q->where('title_et', $city);
                });
            }
        }

        return $clubs->paginate(8);
    }
    public function getPaginatedActivitiesGender(?string $city)
    {
//       dd($city);
        $clubs = Event::query()->where('type', 'activity');

        if(!is_null($city)){
            if(app()->isLocale('en')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title', $city);
                });
            }
            elseif(app()->isLocale('ru')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title_ru', $city);
                });
            }
            elseif(app()->isLocale('fi')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title_fi', $city);
                });
            }
            elseif(app()->isLocale('et')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title_et', $city);
                });
            }
        }

        return $clubs->paginate(8);
    }
    public function getPaginatedPackagesTitle(?string $city)
    {
        $clubs = Event::query()->where('type', 'package');

        if(!is_null($city)){
            if(app()->isLocale('en')){
                return Event::where('type', 'package')->where('title', 'like','%'.$city.'%')->paginate(4);
            }
            elseif(app()->isLocale('ru')){
                return Event::where('type', 'package')->where('title_ru', 'like','%'.$city.'%')->paginate(4);
            }
            elseif(app()->isLocale('fi')){
                return Event::where('type', 'package')->where('title_fi', 'like','%'.$city.'%')->paginate(4);
            }
            elseif(app()->isLocale('et')){
                return Event::where('type', 'package')->where('title_et', 'like','%'.$city.'%')->paginate(4);
            }
        }

        return $clubs->paginate(8);
    }

    public function getPaginatedActivitiesCity(?string $city)
    {
        $clubs = Event::query()->where('type', 'activity');

        if(!is_null($city)){
            if(app()->isLocale('en')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title', $city);
                });
            }
            elseif(app()->isLocale('ru')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title_ru', $city);
                });
            }
            elseif(app()->isLocale('fi')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title_fi', $city);
                });
            }
            elseif(app()->isLocale('et')){
                $clubs = Event::where('type', 'activity')->whereHas('filters', function($q) use($city){
                    return $q->where('title_et', $city);
                });
            }
        }

        return $clubs->paginate(8);
    }

    public function getPaginatedActivitiesTitle(?string $city)
    {
        $clubs = Event::query()->where('type', 'activity');

        if(!is_null($city)){
            if(app()->isLocale('en')){
                return Event::where('type', 'activity')->where('title', 'like','%'.$city.'%')->paginate(4);
            }
            elseif(app()->isLocale('ru')){
                return Event::where('type', 'activity')->where('title_ru', 'like','%'.$city.'%')->paginate(4);
            }
            elseif(app()->isLocale('fi')){
                return Event::where('type', 'activity')->where('title_fi', 'like','%'.$city.'%')->paginate(4);
            }
            elseif(app()->isLocale('et')){
                return Event::where('type', 'activity')->where('title_et', 'like','%'.$city.'%')->paginate(4);
            }
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
            $club->photos = [$fields['gallery'] , $fields['photos']];
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

    public function getPaginatedTicket(?string $city)
    {
        // TODO: Implement getPaginatedTicket() method.
    }
}
