<?php

namespace App\Models;

use App\Models\News;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    public function news()
    {
        return $this->hasMany(News::class, 'admin_id', 'id');
    }
}
