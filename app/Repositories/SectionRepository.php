<?php

namespace App\Repositories;

use App\Models\Section;

class SectionRepository
{
    public function getAll($userId)
    {
        return Section::where(['user_id' => $userId])->get();
    }

    public function findById($id)
    {
        return Section::findOrFail($id);
    }

    public function getById($id, $userId)
    {
        return Section::where(['id' => $id, 'user_id' => $userId])->firstOrFail();
    }

    public function create($data, $userId)
    {
        $data['user_id'] = $userId;
        return Section::create($data);
    }

    public function update($id, $data, $userId)
    {
        $website = $this->getById($id, $userId);
        $data['user_id'] = $userId;
        $website->update($data);
        return $website;
    }

    public function delete($id, $userId)
    {
        $website = $this->getById($id, $userId);
        return $website->delete();
    }
}
