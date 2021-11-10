<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\PhotoRequest;
use App\Service\Photo\PhotoService;

class NewsController extends Controller
{
    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newses = News::paginate(10);
        return view('admin.newss.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $this->validate($request, [
            'title' => 'required|string',
            'title_ru' => 'required|string',
            'title_fi' => 'required|string',
            'title_et' => 'required|string',
            'description' => 'required|string',
            'description_ru' => 'required|string',
            'description_fi' => 'required|string',
            'description_et' => 'required|string',
            'content' => 'required|string',
            'content_ru' => 'required|string',
            'content_fi' => 'required|string',
            'content_et' => 'required|string',
            'date' => 'required|date',
            'slug'=>'required|unique:newses',
            'photos' => 'required|array',
            'photos.*' => 'required|string'
        ]);
        $news = new News();
        $news->fill($validated_data);
        $news->image = $validated_data['photos'][0];
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.newss.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validated_data = $this->validate($request, [
            'title' => 'required|string',
            'title_ru' => 'required|string',
            'title_fi' => 'required|string',
            'title_et' => 'required|string',
            'description' => 'required|string',
            'description_ru' => 'required|string',
            'description_fi' => 'required|string',
            'description_et' => 'required|string',
            'content' => 'required|string',
            'content_ru' => 'required|string',
            'content_fi' => 'required|string',
            'content_et' => 'required|string',
            'date' => 'required|date',
            'slug'=>'required',
            'photos' => 'required|array',
            'photos.*' => 'required|string'
        ]);

//        dd($validated_data);

        $news->fill($validated_data);
        $news->image = $validated_data['photos'][0];
        $news->save();
        return redirect()->route('admin.news.index');
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
        $request->validated();
        $this->photoService->deletePhoto($request->name);

        return response()->json([
            'result' => true,
            'message' => 'You have deleted image successfuly'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
