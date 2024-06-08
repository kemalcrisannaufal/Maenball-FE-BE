<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ScoreController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://livescore-api.com/api-client/scores/history.json?key=e6l0EOXMmvzA4Ckl&secret=SGWyI0VUktY9AeLPl6QZVOMijmSnYcJR&competition_id=244&from=2024-01-01');
        $data = json_decode($response->getBody(), true);


        $latest_match = array_slice($data['data']['match'], -1);
        $matches = array_reverse(array_slice($data['data']['match'], 0, count($data['data']['match']) - 1));

        $matchesCollection = collect($matches);
        $perPage = 10;

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $paginatedMatches = new LengthAwarePaginator(
            $matchesCollection->forPage($currentPage, $perPage),
            $matchesCollection->count(),
            $perPage,
            $currentPage,
    ['path' => request()->url(), 'query' => request()->query()]
);

        return view('score.score', [
            'latest_match' => $latest_match,
            'matches' => $paginatedMatches
        ]);
    }
}
