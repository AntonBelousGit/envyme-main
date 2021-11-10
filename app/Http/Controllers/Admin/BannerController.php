<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\PhotoRequest;
use App\Service\Photo\PhotoService;

class BannerController extends Controller
{
    private $photoService;

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
        $banners = Banner::paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $request->validated();
        $banner = new Banner();
        $banner->fill($request->all());
        $banner->save();
        return redirect()->route('admin.banners.index')->with('status', 'Вы успешно создали баннер');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $request->validated();
        $banner->update($request->all());
        return redirect()->route('admin.banners.index')->with('status', 'Вы успешно изменили баннер');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('status', 'Вы успешно удалили баннер');
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
//        dd($request);
        $this->photoService->deletePhoto($request->name);

        return response()->json([
            'result' => true,
            'message' => 'You have deleted image successfuly'
        ]);
    }
}
