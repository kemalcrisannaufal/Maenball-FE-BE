<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Fixture;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
   public function index()
    {
        $fixtures = Fixture::with(['homeTeam', 'awayTeam'])->paginate(6);
        $schedule = $fixtures->toArray();
        $main_schedule = $schedule['data'][0];
        $schedule = array_slice($schedule['data'], 1);


        return view('schedule.schedule', [
            'fixtures' => $fixtures,
            'main_schedule' => $main_schedule,
            'schedule' => $schedule
        ]);
    }

}
