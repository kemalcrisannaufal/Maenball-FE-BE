<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_fixture',
        'home_score',
        'away_score',
    ];

    public function fixture()
    {
        return $this->belongsTo(Fixture::class, 'id_fixture', 'id');
    }
}
