<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
{
    $client = new Client();
    $response = $client->request('GET', 'https://livescore-api.com/api-client/fixtures/matches.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=66');
    $data = json_decode($response->getBody(), true);

    $main_schedule = null;
    $schedule = null;

    if (count($data['data']['fixtures']) > 0) {
        $main_schedule =  $data['data']['fixtures'][0];
        $schedule = array_slice($data['data']['fixtures'], 1);

        // Paginate the schedule
        $perPage = 5; // Number of items per page
        $page = $request->input('page', 1); // Get the current page or default to 1
        $offset = ($page - 1) * $perPage;
        $items = array_slice($schedule, $offset, $perPage);

        $schedule = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            count($schedule),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }

    return view('schedule.schedule', [
        'main_schedule' => $main_schedule,
        'schedule' => $schedule,
    ]);
}

}
