<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;
    protected $fillable = [
        'team1_id',
        'team2_id',
        'event_id',
        'winner_id',
        'type', // 'final-principal', 'final-consolante', etc.
    ];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

}
