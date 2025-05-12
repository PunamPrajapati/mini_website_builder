<?php

namespace App\Services;

use App\Repositories\WebsiteRepository;
use Illuminate\Http\Request;

class WebsiteService
{
    protected $websiteRepository, $userId;

    public function __construct(Request $request, WebsiteRepository $websiteRepository)
    {
        $this->websiteRepository = $websiteRepository;
        $this->userId = $request->user()->id;
    }

    public function getAll()
    {
        return $this->websiteRepository->getAll($this->userId);
    }

    public function getById($id)
    {
        return $this->websiteRepository->getById($id, $this->userId);
    }

    public function create($data)
    {
        return $this->websiteRepository->create($data, $this->userId);
    }

    public function update($id, $data)
    {
        return $this->websiteRepository->update($id, $data, $this->userId);
    }

    public function delete($id)
    {
        return $this->websiteRepository->delete($id, $this->userId);
    }
}
