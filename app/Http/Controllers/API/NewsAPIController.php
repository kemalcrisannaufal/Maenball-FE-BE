<?php

namespace App\Http\Controllers\API;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsAPIController extends Controller
{
    public function getAllNews()
    {
        try {
            $news = News::all();

            return response()->json([
                'status' => 'success',
                'message' => 'News retrieved successfully',
                'data' => $news,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve news',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function news($id)
    {
        try {
            $news = News::with(['comments.replies.user' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }], 'admin')->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'message' => 'News retrieved successfully',
                'data' => $news,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve news',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
