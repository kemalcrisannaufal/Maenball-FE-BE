<?php

namespace App\Http\Controllers\API;

use App\Models\Video;
use App\Models\LikedVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VideoAPIController extends Controller
{
    public function getAllHighlights()
    {
        $videos = Video::get();
        return response()->json([
            'success' => true,
            'data' => $videos,
        ], 200);
    }

    public function highlight($id)
    {
        $video = Video::find($id);
        if ($video) {
            return response()->json([
                'success' => true,
                'data' => $video,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Video not found',
            ], 404);
        }
    }

    public function likedVideos($user_id)
    {
        $liked_videos = LikedVideo::with('video')->where('user_id', $user_id)->get();
        return response()->json([
            'success' => true,
            'data' => $liked_videos
        ], 200);
    }
}
