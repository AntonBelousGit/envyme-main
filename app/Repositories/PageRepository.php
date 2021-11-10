<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{

    public function createPage(array $fields)
    {
        Page::create($fields);
    }

    public function updatePage(Page $page, array $fields)
    {
        $page->update($fields);
    }

    public function deletePage(Page $page)
    {
        $page->delete();
    }

    public function getAllPages()
    {
        return Page::all();
    }

    public function getCountOfPages()
    {
        return Page::count();
    }
}