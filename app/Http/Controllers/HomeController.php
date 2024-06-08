<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Video;
use GuzzleHttp\Client;
use App\Models\Fixture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $latest_news = News::latest()->take(3)->get();
    //     $highlights = Video::orderBy('created_at', 'desc')
    //             ->take(3)
    //             ->get();

    //     // Get Standings
    //     $client = new Client();
    //     $response = $client->request('GET', 'https://livescore-api.com/api-client/competitions/standings.json?competition_id=244&key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR');
    //     $standing_data = json_decode($response->getBody(), true);


    //     $groupA = array_slice($standing_data['data']['table'], 0, 4);
    //     $groupB = array_slice($standing_data['data']['table'], 4, 8);
    //     $groupC = array_slice($standing_data['data']['table'], 8, 12);
    //     $groupD = array_slice($standing_data['data']['table'], 12, 16);
    //     $groupE = array_slice($standing_data['data']['table'], 16, 20);
    //     $groupF = array_slice($standing_data['data']['table'], 20, 24);
    //     $groupG = array_slice($standing_data['data']['table'], 24, 28);
    //     $groupH = array_slice($standing_data['data']['table'], 28, 32);

    //     $standings = [$groupA, $groupB, $groupC, $groupD, $groupE, $groupF, $groupG, $groupH];

    //     $client = new Client();
    //     $response = $client->request('GET', 'https://livescore-api.com/api-client/fixtures/matches.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=244');
    //     $schedule = json_decode($response->getBody(), true)['data']['fixtures'];

    //     if (count($schedule) > 5) {
    //         $schedule = array_slice($schedule, 0, 5);
    //         $score = null;
    //     } else {
    //         $client = new Client();
    //         $response = $client->request('GET', 'https://livescore-api.com/api-client/scores/history.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=244&from=2024-01-01');
    //         $score = json_decode($response->getBody(), true)['data']['match'];
    //         $score = array_reverse(array_slice($score, 0, 5 - count($schedule)));
    //     }

    //     return view('home', [
    //         'latest_news' => $latest_news,
    //         'highlights' => $highlights,
    //         'standings' => $standings,
    //         'schedule' => $schedule,
    //         'score' => $score
    //     ]);
    // }

    public function index()
    {

        $latest_news = News::latest()->take(3)->get();
        $highlights = Video::orderBy('created_at', 'desc')
                ->take(4)
                ->get();


        $client = new Client();
        $response = $client->request('GET', 'https://apiv3.apifootball.com/?action=get_standings&league_id=3&APIkey=0cf995bcb31e9a372e3560438810045a4b70127add7c56f8081296664103e877');
        $responseBody = $response->getBody()->getContents();
        $data = json_decode($responseBody, true);

        $groupA = array_slice($data, 0, 4);
        $groupB = array_slice($data, 4, 8);
        $groupC = array_slice($data, 8, 12);
        $groupD = array_slice($data, 12, 16);
        $groupE = array_slice($data, 16, 20);
        $groupF = array_slice($data, 20, 24);
        $groupG = array_slice($data, 24, 28);
        $groupH = array_slice($data, 28, 32);

        $standings = [$groupA, $groupB, $groupC, $groupD, $groupE, $groupF, $groupG, $groupH];

        $fixtures = Fixture::with(['homeTeam', 'awayTeam'])->take(5)->get()->toArray();

        if (count($fixtures) >= 5) {
            $fixtures = array_slice($fixtures, 0, 5);
            $score = null;
        } else {
            // $client = new Client();
            // $response = $client->request('GET', 'https://livescore-api.com/api-client/scores/history.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=244&from=2024-01-01');
            // $score = json_decode($response->getBody(), true)['data']['match'];
            // $score = array_reverse(array_slice($score, 0, 5 - count($fixtures)));
        }

        return view('home', [
            'latest_news' => $latest_news,
            'highlights' => $highlights,
            'standings' => $standings,
            'fixtures' => $fixtures,
            'score' => null
        ]);

    }
}
