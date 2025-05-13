<?php

namespace App\Repositories;

use App\Models\Page;

class PageRepository
{
    public function getAll($userId)
    {
        return Page::where(['user_id' => $userId])->get();
    }

    public function findById($id)
    {
        return Page::findOrFail($id);
    }

    public function getById($id, $userId)
    {
        return Page::where(['id' => $id, 'user_id' => $userId])->firstOrFail();
    }

    public function create($data, $userId)
    {
        $data['user_id'] = $userId;
        return Page::create($data);
    }

    public function update($id, $data, $userId)
    {
        $page = $this->getById($id, $userId);
        $data['user_id'] = $userId;
        $page->update($data);
        return $page;
    }

    public function delete($id, $userId)
    {
        $page = $this->getById($id, $userId);
        return $page->delete();
    }
}
