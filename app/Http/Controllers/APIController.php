<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use GuzzleHttp\Client;
use App\Models\Fixture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function login(Request $request)
    {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);


    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return response()->json([
            'message' => 'success',
        ], 200);
    }

    return response()->json([
        'message' => 'failed',
        'errors' => [
            'email' => ['The provided credentials do not match our records.'],
        ],
    ], 401);
    }
    public function getAllNews()
    {
        $news = News::get();
        return response()->json($news);
    }

    public function news($id)
    {
        $news = News::with(['comments.replies.user' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }], 'admin')->findOrFail($id);
        return response()->json($news);
    }

    public function getAllHighlights()
    {
        $videos = Video::get();

        return response()->json($videos);
    }

    public function highlight($id)
    {
        $video = Video::findOrFail($id);
        return response()->json($video);
    }

    public function getAllFixtures()
    {
        $fixtures = Fixture::with(['homeTeam', 'awayTeam'])->get();
        return response()->json($fixtures);
    }

}
