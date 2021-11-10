<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Clubs\ClubService;
use App\Http\Requests\ClubRequest;
use App\Http\Requests\PhotoRequest;
use App\Models\Club;
use App\Models\Filter;

class ClubController extends Controller
{
    private $clubService;
    public function __construct(ClubService $clubService)
    {
        $this->clubService = $clubService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = $this->clubService->getAllClubs();
        $count = $this->clubService->getCountOfClubs();
        return view('admin.clubs.index', compact('clubs', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = $this->clubService->getAllFeatures();
        $cities = Filter::where('type', 'city')->get();
        return view('admin.clubs.create', compact('features','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClubRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClubRequest $request)
    {

        $request->validated();


        $this->clubService->createClub($request->all());
       // dd($request);
        return redirect()->route('admin.clubs.index')->with('status', 'Вы успешно добавили клуб');
    }

    public function show(Club $club)
    {
        $club_features = $club->filters()->where('type', 'feature')->get()->toArray();
        $club->tickets;
        // $club_features = [];
        // foreach($tmp_features as $feature)
        // {
        //     array_push($club_features, $feature->id);
        // }
        return response()->json([
            'club_features' => $club_features,
            'club' => $club,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Club $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        $tmp_features = $club->filters()->where('type', 'feature')->get();
        $tmp_city = $club->filters()->where('type', 'city')->get();
        $club_features = [];
        $club_city = [];


        foreach($tmp_features as $feature)
        {
            array_push($club_features, $feature->id);
        }
        foreach($tmp_city as $feature)
        {
            array_push($club_city, $feature->id);
        }
//        dd($club_city);

        $cities = Filter::where('type', 'city')->get();
        $features = Filter::where('type', 'feature')->get();
        return view('admin.clubs.edit', compact('club', 'club_features','club_city', 'features','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClubRequest $request
     * @param  Club $club
     * @return \Illuminate\Http\Response
     */
    public function update(ClubRequest $request, Club $club)
    {
//        dd($request);
        $request->validated();
        $this->clubService->updateClub($club, $request->all());
//        dd($request);
        return redirect()->route('admin.clubs.index')->with('status', 'Вы успешно изменили клуб');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $this->clubService->deleteClub($club);
        return redirect()->route('admin.clubs.index')->with('status', 'Вы успешно изменили клуб');
    }

    public function addPhoto(PhotoRequest $request)
    {
        $request->validated();
        $fileName = $this->clubService->addPhoto($request);

        return response()->json([
            'filename' => $fileName,
        ]);
    }

    public function removePhoto(PhotoRequest $request)
    {
        $request->validated();

        $this->clubService->deletePhoto($request->name);
//        dd($request->name);
        return response()->json([
            'result' => true,
            'message' => 'You have deleted image successfuly'
        ]);
    }
}
