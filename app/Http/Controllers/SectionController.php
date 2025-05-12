<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Services\SectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    protected $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function getAll()
    {
        $sections = $this->sectionService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Sections data fetched successfully',
            'data' => $sections,
        ], 200);
    }

    public function getById($id, Request $request)
    {
        try {
            $section = $this->sectionService->getById($id);
            return response()->json([
                'status' => true,
                'message' => 'Section data fetched successfully',
                'data' => $section,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'Section data not found',
            ], 404);
        }
    }

    public function create(Request $request)
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
        $section = $this->sectionService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Section data created successfully',
            'data' => $section,
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
            $section = $this->sectionService->update($id, $data);

            return response()->json([
                'status' => true,
                'message' => 'Section data updated successfully',
                'data' => $section,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Section data not found',
            ], 404);
        }
    }

    public function delete($id)
    {
        try {
            $this->sectionService->delete($id);

            return response()->json([
                'status' => true,
                'message' => 'Section deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Section not found',
            ], 404);
        }
    }
}
