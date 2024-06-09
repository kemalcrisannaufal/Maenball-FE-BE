<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "id_home_team",
        "id_away_team",
        "location",
        "kickoff",
        "id_season",
        "status",
    ];

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, "id_home_team", "id");
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, "id_away_team", "id");
    }

    public function season()
    {
        return $this->belongsTo(Season::class, "id_season", "id");
    }
}
