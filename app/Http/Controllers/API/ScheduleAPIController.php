<?php

namespace App\Http\Controllers\API;

use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleAPIController extends Controller
{
    public function getAllSchedule()
    {
        $fixtures = Fixture::with(['homeTeam', 'awayTeam']);
        return response()->json([
            'success' => true,
            'data' => $fixtures
        ], 200);
    }
}
