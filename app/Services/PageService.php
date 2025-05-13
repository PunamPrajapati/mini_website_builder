<?php

namespace App\Services;

use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageService
{
    protected $pageRepository, $userId;

    public function __construct(Request $request, PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->userId = $request->user()->id;
    }

    public function getAll()
    {
        return $this->pageRepository->getAll($this->userId);
    }

    public function getById($id)
    {
        return $this->pageRepository->getById($id, $this->userId);
    }

    public function create($data)
    {
        return $this->pageRepository->create($data, $this->userId);
    }

    public function update($id, $data)
    {
        return $this->pageRepository->update($id, $data, $this->userId);
    }

    public function delete($id)
    {
        return $this->pageRepository->delete($id, $this->userId);
    }
}
