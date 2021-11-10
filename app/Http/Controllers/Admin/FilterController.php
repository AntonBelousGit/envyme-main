<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use App\Service\Filter\FilterService;

class FilterController extends Controller
{
    private $filterService;
    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = $this->filterService->getAllFilters();
        return view('admin.filters.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countrys = Filter::where('type','country')->get();

        return view('admin.filters.create',compact('countrys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterRequest $request)
    {
//        dd($request->all());

        $validated_data = $this->validate($request, [
            '_token' =>'required',
            'title' => 'required|string|max:255',
            'filter_id' => 'required',
            'type' => 'required',
        ]);

        if($validated_data['filter_id'] === 'null'){
            $validated_data['filter_id'] = null;
        }


        $this->filterService->createFilter($validated_data);
        return redirect()->route('admin.filters.index')->with('status', 'Вы успешно создали фильтр');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function edit(Filter $filter)
    {

        $countrys = Filter::where('type','country')->get();
        return view('admin.filters.edit', compact('filter','countrys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function update(FilterRequest $request, Filter $filter)
    {
        $validated_data = $this->validate($request, [
            '_token' =>'required',
            'title' => 'required|string|max:255',
            'filter_id' => 'required',
            'type' => 'required',
        ]);

        if($validated_data['filter_id'] === 'null'){
            $validated_data['filter_id'] = null;
        }
        $this->filterService->updateFilter($filter,$validated_data);
        return redirect()->route('admin.filters.index')->with('status', 'Вы успешно изменили фильтр');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filter $filter)
    {
        $this->filterService->deleteFilter($filter);
        return redirect()->route('admin.filters.index')->with('status', 'Вы успешно удалили фильтр');
    }
}
