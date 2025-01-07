<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'name',
        'profile_pic',
    ];

    protected $hidden = ['password'];

    public function coachDetails()
    {
        return $this->hasOne(CoachDetail::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'buyer_id');
    }
}
