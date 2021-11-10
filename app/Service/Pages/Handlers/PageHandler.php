<?php


namespace App\Service\Pages\Handlers;
use App\Models\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;
use Illuminate\Http\Request;

class PageHandler
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function createPage(array $fields)
    {
        $this->pageRepository->createPage($fields);
    }

    public function getAllPages()
    {
        return $this->pageRepository->getAllPages();
    }

    public function updatePage(Page $page, array $fields)
    {
        return $this->pageRepository->updatePage($page, $fields);
    }

    public function deletePage(Page $page)
    {
        return $this->pageRepository->deletePage($page);
    }

    public function getCountOfPages()
    {
        return $this->pageRepository->getCountOfPages();
    }
}