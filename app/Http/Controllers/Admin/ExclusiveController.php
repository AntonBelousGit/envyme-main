<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exclusive;
use Illuminate\Http\Request;

class ExclusiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exclusives = Exclusive::all();
        return  view('admin.exclusives.index',compact('exclusives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exclusive  $exclusive
     * @return \Illuminate\Http\Response
     */
    public function show(Exclusive $exclusive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exclusive  $exclusive
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exclusive = Exclusive::where('id',$id)->first();
        return view('admin.exclusives.edit', compact('exclusive'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'content'=> 'required',
            'content_ru'=> 'required',
            'content_fi'=> 'required',
            'content_et'=> 'required',
        ]);

        $exclusive = Exclusive::find($id);
//        dd($exclusive);


        $exclusive->fill($request->all());
        $exclusive->update();

        return redirect()->route('admin.exclusives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exclusive  $exclusive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exclusive $exclusive)
    {
        //
    }
}
