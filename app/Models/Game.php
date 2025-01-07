<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = [
        'game_name',
        'game_image',
    ];

    public function coaches()
    {
        return $this->belongsToMany(CoachDetail::class, 'coach_game');
    }
}
