<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'buy_rule' => 'required|string',
            'member_rule' => 'required|string',
            'vip_rule' => 'required|string',
            'increase_bonus_rule' => 'required|string',
            'male_striptease_rule' => 'required|string',
            'multiple_tickets_rule' => 'required|string',
            'support_rule' => 'required|string'
        ]);

        Faq::create($request->all());
        return redirect()->route('admin.faqs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'buy_rule' => 'required|string',
            'member_rule' => 'required|string',
            'vip_rule' => 'required|string',
            'increase_bonus_rule' => 'required|string',
            'male_striptease_rule' => 'required|string',
            'multiple_tickets_rule' => 'required|string',
            'support_rule' => 'required|string'
        ]);

        dd($request);
        $faq->update($request->all());
        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index');
    }
}
