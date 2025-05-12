<?php

namespace App\Services;

use App\Repositories\SectionRepository;
use Illuminate\Http\Request;

class SectionService
{
    protected $sectionRepository, $userId;

    public function __construct(Request $request, SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
        $this->userId = $request->user()->id;
    }

    public function getAll()
    {
        return $this->sectionRepository->getAll($this->userId);
    }

    public function getById($id)
    {
        return $this->sectionRepository->getById($id, $this->userId);
    }

    public function create($data)
    {
        return $this->sectionRepository->create($data, $this->userId);
    }

    public function update($id, $data)
    {
        return $this->sectionRepository->update($id, $data, $this->userId);
    }

    public function delete($id)
    {
        return $this->sectionRepository->delete($id, $this->userId);
    }
}
