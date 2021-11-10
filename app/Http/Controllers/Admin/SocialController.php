<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(){
        $social = Social::all();
        return view('admin.social.index', compact('social'));
    }

    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
        ]);

        $banner = new Social;
        $banner->fill($request->all());
        $banner->save();

        return redirect()->route('admin.social.index');
    }

    public function edit(Social $social)
    {
        return view('admin.social.edit', compact('social'));
    }

    public function update(Request $request, Social $social){
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
        ]);

        $social->fill($request->all());
        $social->update();

        return redirect()->route('admin.social.index');
    }

}
