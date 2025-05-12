<?php

namespace App\Services;

use App\Repositories\WebsiteRepository;

class WebsiteService
{
    protected $websiteRepository;

    public function __construct(WebsiteRepository $websiteRepository)
    {
        $this->websiteRepository = $websiteRepository;
    }

    public function getAll()
    {
        return $this->websiteRepository->getAll();
    }

    public function findById($id)
    {
        return $this->websiteRepository->findById($id);
    }

    public function create($data)
    {
        return $this->websiteRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->websiteRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->websiteRepository->delete($id);
    }
}
