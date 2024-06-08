<?php

namespace App\Models;

use App\Models\LikeVideo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'description',
        'thumbnail',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(LikeVideo::class, 'video_id', 'id');
    }
}
