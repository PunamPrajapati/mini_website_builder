<?php

namespace App\Repositories;

use App\Models\Website;

class WebsiteRepository
{
    public function getAll($userId)
    {
        return Website::where(['user_id' => $userId])->get();
    }

    public function findById($id)
    {
        return Website::findOrFail($id);
    }

    public function getById($id, $userId)
    {
        return Website::where(['id' => $id, 'user_id' => $userId])->firstOrFail();
    }

    public function create($data, $userId)
    {
        $data['user_id'] = $userId;
        return Website::create($data);
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
