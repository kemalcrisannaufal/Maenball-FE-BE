<?php

namespace App\Http\Controllers;

use App\Models\Score;
use GuzzleHttp\Client;
use App\Models\Fixture;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ScoreController extends Controller
{

    public function index()
    {
        $list_scores = Score::with('fixture.homeTeam', 'fixture.awayTeam', 'fixture.season')->paginate(5
        );
        $scores = $list_scores->toArray();
        $last_score = $scores['data'][0];
        $scores = array_slice($scores['data'], 1);
        // dd($last_score);
        return view('score.score', [
            'list_scores' => $list_scores,
            'last_score' => $last_score,
            'scores' => $scores
        ]);
    }

    public function indexAdmin()
    {
        $scores = Score::with('fixture.homeTeam', 'fixture.awayTeam', 'fixture.season')->paginate(10);
        return view('score.admin.listScore', [
            'scores' => $scores
        ]);
    }
    public function store($id, Request $request)
    {
        $score = new Score();
        $score->id_fixture = $id;
        $score->home_score = $request->home_score;
        $score->away_score = $request->away_score;
        $score->save();

        $fixture = Fixture::findOrFail($id);
        $fixture->status = 'finished';
        $fixture->save();

        return redirect('/admin/list-scores');
    }

    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $fixture = Fixture::findOrFail($score->id_fixture);
        $fixture->status = 'upcoming';
        $fixture->save();
        $score->delete();
        return redirect('/admin/list-scores');
    }



}
