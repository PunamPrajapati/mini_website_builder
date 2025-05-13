<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    protected $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function getAll()
    {
        $pages = $this->pageService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Pages data fetched successfully',
            'data' => $pages,
        ], 200);
    }

    public function getById($id, Request $request)
    {
        try {
            $page = $this->pageService->getById($id);
            return response()->json([
                'status' => true,
                'message' => 'Page data fetched successfully',
                'data' => $page,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'Page data not found',
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:pages',
            'content' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Errors',
                'data' => $validator->errors()->all()
            ]);
        }
        $page = $this->pageService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Page data created successfully',
            'data' => $page,
        ], 201); // 201: Created
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Errors',
                'data' => $validator->errors()->all()
            ]);
        }
        try {
            $page = $this->pageService->update($id, $data);

            return response()->json([
                'status' => true,
                'message' => 'Page data updated successfully',
                'data' => $page,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Page data not found',
            ], 404);
        }
    }

    public function delete($id)
    {
        try {
            $this->pageService->delete($id);

            return response()->json([
                'status' => true,
                'message' => 'Page deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Page not found',
            ], 404);
        }
    }
}
