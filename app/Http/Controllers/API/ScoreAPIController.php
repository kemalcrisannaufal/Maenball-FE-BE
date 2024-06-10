<?php

namespace App\Http\Controllers\API;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScoreAPIController extends Controller
{
    public function getAllScore()
    {
        $scores = Score::with('fixture.homeTeam', 'fixture.awayTeam', 'fixture.season')->get();
        return response()->json([
            'status' => 'success',
            'scores' => $scores
        ], 200);
    }
}
