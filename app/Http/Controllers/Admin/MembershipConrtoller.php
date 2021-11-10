<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Http\Requests\PhotoRequest;
use Illuminate\Http\Request;
use App\Service\Photo\PhotoService;

class MembershipConrtoller extends Controller
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
        $membership = Membership::first();
        return view('admin.membership.index', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
//        dd($request);
        $this->validate($request, [
            'photos'=> 'required',
            'gallery'=>'required',
            'description' => 'required|string',
            'bonus_description' => 'required|string',
            'silver_description' => 'required|string',
            'gold_description' => 'required|string',
            'diamond_description' => 'required|string',
            'description_ru' => 'required|string',
            'bonus_description_ru' => 'required|string',
            'silver_description_ru' => 'required|string',
            'gold_description_ru' => 'required|string',
            'diamond_description_ru' => 'required|string',
            'description_fi' => 'required|string',
            'bonus_description_fi' => 'required|string',
            'silver_description_fi' => 'required|string',
            'gold_description_fi' => 'required|string',
            'diamond_description_fi' => 'required|string',
            'description_et' => 'required|string',
            'bonus_description_et' => 'required|string',
            'silver_description_et' => 'required|string',
            'gold_description_et' => 'required|string',
            'diamond_description_et' => 'required|string',
            'data_ru' => 'required|string',
            'data_fi' => 'required|string',
            'data_et' => 'required|string'
        ]);

//        dd($request);
//
//        $data = [];
//
//        foreach($request->all() as $key => $value)
//        {
//            if(gettype($value) === 'array')
//            {
//                $item1 = $value[1] === 'on' ? true : false;
//                $item2 = $value[2] === 'on' ? true : false;
//                $item3 = $value[3] === 'on' ? true : false;
//                $item4 = $value[4] === 'on' ? true : false;
//                $data[$value[0]] = [$item1, $item2, $item3, $item4];
//            }
//        }
//        dd($data);
        $membership->update($request->all());
//        $membership->data = $data;


        $membership->photos = array_merge_recursive($request['gallery'],$request['photos']);
//      $club->photos = [$fields['gallery'] , $fields['photos']]
//            dd($club->photos);

        $membership->save();

        return redirect()->route('admin.memberships.index');
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
}
