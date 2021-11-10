<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\Page;

interface PageRepositoryInterface
{
    public function createPage(array $fields);
    public function updatePage(Page $page, array $fields);
    public function deletePage(Page $page);
    public function getAllPages();
    public function getCountOfPages();
}