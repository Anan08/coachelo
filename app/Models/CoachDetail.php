<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachDetail extends Model
{
    use HasFactory;
    protected $table = 'coach_details';

    protected $fillable = [
        'game_id',
        'user_id',
        'desc',
        'price',
        'cv',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'coach_game');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'coach_id');
    }
}
