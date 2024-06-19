<?php

namespace App\Http\Controllers\API;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScoreAPIController extends Controller
{
    public function getAllScore()
    {
        $scores = Score::get();
        dd($scores);
        return response()->json([
            'status' => 'success',
            'data' => $scores
        ], 200);
    }
}
