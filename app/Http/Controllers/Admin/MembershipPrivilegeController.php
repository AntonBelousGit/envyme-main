<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipPrivilege;
use Illuminate\Http\Request;

class MembershipPrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = MembershipPrivilege::all();
        return view('admin.membership_privilege.index',compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership_privilege.create');
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
            'title_ru' => 'required|string',
            'title_et' => 'required|string',
            'title_fi' => 'required|string',
        ]);

        MembershipPrivilege::create($request->all());
        return redirect()->route('admin.benefits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MembershipPrivilege  $membershipPrivilege
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipPrivilege $membershipPrivilege)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembershipPrivilege  $membershipPrivilege
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membershipPrivilege = MembershipPrivilege::where('id',$id)->first();
        return view('admin.membership_privilege.edit', compact('membershipPrivilege'));
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
            'title' => 'required|string',
            'title_ru' => 'required|string',
            'title_et' => 'required|string',
            'title_fi' => 'required|string',
        ]);

        $membershipPrivilege = MembershipPrivilege::find($id);
//        dd($membershipPrivilege);
        if (!isset($request->bonus)){
            $request->merge(['bonus'=>'off']);
        }
        if (!isset($request->silver)){
            $request->merge(['silver'=>'off']);
        }
        if (!isset($request->gold)){
            $request->merge(['gold'=>'off']);
        }
        if (!isset($request->bonus)){
            $request->merge(['diamond'=>'off']);
        }

        $membershipPrivilege->fill($request->all());
        $membershipPrivilege->update();

//        dd($membershipPrivilege);
        return redirect()->route('admin.benefits.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembershipPrivilege  $membershipPrivilege
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membershipPrivilege = MembershipPrivilege::where('id',$id)->first();
        $membershipPrivilege->delete();
        return redirect()->route('admin.benefits.index');
    }
}
