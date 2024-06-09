<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Score;
use App\Models\Video;
use GuzzleHttp\Client;
use App\Models\Fixture;
use Illuminate\Http\Request;

class HomeController extends Controller
{

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
            $score = Score::with('fixture.homeTeam', 'fixture.awayTeam', 'fixture.season')->take(5-count($fixtures))->get()->toArray();
        }

        return view('home', [
            'latest_news' => $latest_news,
            'highlights' => $highlights,
            'standings' => $standings,
            'fixtures' => $fixtures,
            'score' => $score
        ]);

    }
}
