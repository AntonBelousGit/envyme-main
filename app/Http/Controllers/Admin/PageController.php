<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\PageRequest;
use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Service\Pages\Handlers\PageHandler;

class PageController extends Controller
{
    private $pageService;
    public function __construct(PageHandler $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->pageService->getAllPages();
        $count = $this->pageService->getCountOfPages();
        return view('admin.pages.index', compact('pages', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $request->validated();
        $this->pageService->createPage($request->all());
        return redirect()->route('admin.pages.index')->with('status', 'Вы успешно создали страницу');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $request->validated();
        $this->pageService->updatePage($page, $request->all());
        return redirect()->route('admin.pages.index')->with('status', 'Вы успешно изменили страницу');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->pageService->deletePage($page);
        return redirect()->route('admin.pages.index')->with('status', 'Вы успешно удалили страницу');
    }
}
