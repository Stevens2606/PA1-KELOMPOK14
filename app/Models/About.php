<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\About; // Import class Abouts


class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'video_url',
        'image_path',
        'user_id',
    ];
}