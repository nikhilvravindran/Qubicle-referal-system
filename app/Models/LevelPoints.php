<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPoints extends Model
{
    use HasFactory;
    public $table = "level_points";
    public $fillable = [
        'level',
        'points'
    ];
}
