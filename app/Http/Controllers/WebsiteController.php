<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Services\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{

    protected $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    public function getAll()
    {
        $websites = $this->websiteService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Websites fetched successfully',
            'data' => $websites,
        ], 200);
    }

    public function findById($id)
    {
        try {
            $website = $this->websiteService->findById($id);
            return response()->json([
                'status' => true,
                'message' => 'Website fetched successfully',
                'data' => $website,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'Website not found',
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'website_name' => 'required|string|max:255',
            'url' => 'required|string|unique:websites',
            'user_id' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Errors',
                'data' => $validator->errors()->all()
            ]);
        }
        $website = $this->websiteService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Website created successfully',
            'data' => $website,
        ], 201); // 201: Created
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'website_name' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|string|unique:websites,url,' . $id,
            'user_id' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Errors',
                'data' => $validator->errors()->all()
            ]);
        }
        try {
            $website = $this->websiteService->update($id, $data);

            return response()->json([
                'status' => true,
                'message' => 'Website updated successfully',
                'data' => $website,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Website not found',
            ], 404);
        }
    }

    public function delete($id)
    {
        try {
            $this->websiteService->delete($id);

            return response()->json([
                'status' => true,
                'message' => 'Website deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Website not found',
            ], 404);
        }
    }
}
