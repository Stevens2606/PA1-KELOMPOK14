<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'mission',
        'vision',
        'team',
        'values',
        'video_url',
    ];

    protected $casts = [
        'team' => 'array',
        'values' => 'array',
    ];
}