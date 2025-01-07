<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'coach_id',
        'buyer_id',
        'session_id',
        'transaction_date',
        'session_date',
        'amount',
        'status',
        'game_id',
        'isFinished',
        'transaction_date'

    ];

    public function coach()
    {
        return $this->belongsTo(CoachDetail::class, 'coach_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function game() 
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
