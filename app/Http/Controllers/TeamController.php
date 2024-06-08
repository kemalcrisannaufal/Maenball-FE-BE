<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::get();
        return view('admin.team.team', [
            'teams' => $teams
        ]);
    }

    public function create()
    {
        return view('admin.team.addTeam');
    }

    public function store(Request $request){
        $fileName = '';
        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileName = "logo".'-'. now()->timestamp . '.' . $extension;
            $request->file('logo')->storeAs('logo', $fileName);
        }

        $newData = $request->all();
        $newData['logo'] = $fileName;
        $team = Team::create($newData);
        return redirect('/admin/list-teams');
    }
}
