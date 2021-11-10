<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Club;
use App\Http\Requests\PhotoRequest;
use App\Models\Filter;
use App\Models\Social;
use App\Repositories\FilterRepository;
use App\Service\Event\EventService;
use App\Service\Photo\PhotoService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $photoService;
    private $filterRepository;
    private $eventService;

    public function __construct(PhotoService $photoService, EventService $eventService)
    {
        $this->photoService = $photoService;
        $this->eventService = $eventService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $gender = Filter::where('type', 'gender')->get();
        $cities = Filter::where('type', 'city')->get();
        $clubs = Club::all();

        return view('admin.events.create', compact('clubs','gender','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'title' => 'required|string',
            'information' => 'required|string',
            'type' => 'required|string',
            'amount_person' => 'required|numeric',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'clubs_id' => 'required|array',
            'image' => 'required|string',
//            'features'=>'required'
        ]);
        foreach($request->clubs_id as $id){
            $event = new Event();

            $event->fill($request->all());
            $event->club()->associate($id);
            $event->save();

            $features = Filter::whereIn('title', $request->features)->get();

            foreach($features as $city){
                $event->filters()->attach($city);
            }

//            $event->filters()->attach($features);

        }

        return redirect()->route('admin.events.index');
    }
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'title' => 'required|string',
//            'information' => 'required|string',
//            'type' => 'required|string',
//            'amount_person' => 'required|numeric',
//            'price' => 'required|numeric',
//            'date' => 'required|date',
//            'clubs_id' => 'required|array',
//            'image' => 'required|string'
//        ]);
//        foreach($request->clubs_id as $id){
//            $event = new Event();
//            $event->fill($request->all());
//            $event->club()->associate($id);
//            $event->save();
//        }
//        return redirect()->route('admin.events.index');
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $clubs = Club::all();
        $genders = $event->filters()->where('type', 'gender')->get();
        $cities = Filter::where('type', 'city')->get();
        $tmp_city = $event->filters()->where('type', 'city')->get();

        $genderr = Filter::where('type', 'gender')->get();
        $genders_arr = [];
        $club_city = [];

        foreach($genders as $gender)
        {
            array_push($genders_arr, $gender->id);
        }
        foreach($tmp_city as $feature)
        {
            array_push($club_city, $feature->id);
        }
        return view('admin.events.edit', compact('event', 'clubs','genders_arr','genderr','cities','club_city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'information' => 'required|string',
            'type' => 'required|string',
            'amount_person' => 'required|numeric',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'club_id' => 'required|numeric',
            'image' => 'required|string',
            'features'=>'required',
        ]);


        $event->update($request->all());

//    dd($request);
        $features = Filter::whereIn('title', $request->features)->get();
        dd($features);
        $event->filters()->sync([]);
        foreach($features as $city){
            $event->filters()->attach($city);
        }

        if($event->club->id !== $request->club_id){
            $event->club()->dissociate();
            $event->club()->associate($request->club_id);
        }
        $event->save();

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index');
    }

    public function addPhoto(PhotoRequest $request)
    {
        $request->validated();
        $fileName = $this->photoService->addPhoto($request);

        return response()->json([
            'filename' => $fileName,
        ]);
    }

    public function removePhoto(PhotoRequest $request)
    {
        dd($request->name);
        $request->validated();

        $this->photoService->deletePhoto($request->name);

        return response()->json([
            'result' => true,
            'message' => 'You have deleted image successfuly'
        ]);
    }

    public function getPackage(Event $package)
    {
        $features =  $package->filters->where('type', 'feature');
//        dd($features);
        $cities = $package->filters->where('type', 'city');
        $socials = Social::all()->sortBy('id');
        $recently_packages = Event::where('type', 'package')->inRandomOrder()->take(4)->get();

        if(app()->isLocale('ru')){
            $package->title = $package->title_ru;
            $package->information = $package->information_ru;
            $package->additional_information = $package->additional_information_ru;
        }
        elseif(app()->isLocale('fi')){
            $package->title = $package->title_fi;
            $package->information = $package->information_fi;
            $package->additional_information = $package->additional_information_fi;
        }
        elseif(app()->isLocale('et')){
            $package->title = $package->title_et;
            $package->information = $package->information_et;
            $package->additional_information = $package->additional_information_et;
        }

        return view('pages.package_card', compact('package', 'cities', 'features', 'recently_packages','socials'));
    }

    public function getActivity(Event $activity)
    {
        $features =  $activity->filters->where('type', 'feature');
        $cities = $activity->filters->where('type', 'city');
        $socials = Social::all()->sortBy('id');
        $recently_activities = Event::where('type', 'activity')->inRandomOrder()->take(4)->get();


        if(app()->isLocale('ru')){
            $activity->title = $activity->title_ru;
            $activity->information = $activity->information_ru;
            $activity->additional_information = $activity->additional_information_ru;
        }
        elseif(app()->isLocale('fi')){
            $activity->title = $activity->title_fi;
            $activity->information = $activity->information_fi;
            $activity->additional_information = $activity->additional_information_fi;
        }
        elseif(app()->isLocale('et')){
            $activity->title = $activity->title_et;
            $activity->information = $activity->information_et;
            $activity->additional_information = $activity->additional_information_et;
        }
        return view('pages.activity_card', compact('activity', 'cities', 'features', 'recently_activities','socials'));
    }

}
