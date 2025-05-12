<?php

namespace App\Repositories;

use App\Models\Website;

class WebsiteRepository
{
    public function getAll()
    {
        return Website::all();
    }

    public function findById($id)
    {
        return Website::findOrFail($id);
    }

    public function create($data)
    {
        return Website::create($data);
    }

    public function update($id, $data)
    {
        $website = $this->findById($id);
        $website->update($data);
        return $website;
    }

    public function delete($id)
    {
        $website = $this->findById($id);
        return $website->delete();
    }
}
