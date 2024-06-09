<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Season;
use App\Models\Fixture;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    public function index()
    {
        $fixtures = Fixture::with(['homeTeam', 'awayTeam'])->paginate(10);
        return view('fixture.admin.fixture', [
            'fixtures' => $fixtures
        ]);

    }

    public function create()
    {
        $teams = Team::get();
        $seasons = Season::get();
        return view('fixture.admin.addFixture', [
            'teams' => $teams,
            'seasons' => $seasons]);
    }

    public function store(Request $request)
    {
        $fixture = new Fixture();
        $fixture->fill($request->all());
        $fixture->save();
        return redirect('/admin/list-fixtures');
    }

    public function edit($id)
    {
        $fixture = Fixture::findOrFail($id)->with(['homeTeam', 'awayTeam', 'season'])->first();
        return view('fixture.admin.editFixture', [
            'fixture' => $fixture,
        ]);
    }

    public function destroy($id)
    {
        $fixture = Fixture::find($id);
        $fixture->delete();
        return redirect('/admin/list-fixtures');
    }
}

