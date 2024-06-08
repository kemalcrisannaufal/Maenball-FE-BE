<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::get();
        return view('admin.season.season', [
            'seasons' => $seasons
        ]);
    }



    public function create()
    {
        return view('admin.season.addSeason');
    }

    public function store()
    {
        $seaons = Season::create(request()->all());
        return redirect('/admin/list-seasons');
    }

}
