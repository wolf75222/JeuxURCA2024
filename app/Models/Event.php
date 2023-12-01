<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_event', 'event_id', 'team_id')
            ->withPivot('preferred_order')
            ->withTimestamps();
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function matches()
    {
        return $this->hasMany(Matche::class);
    }

    public function phases()
    {
        return $this->hasMany(Phase::class);
    }

    public function register_teams() {
        return $this->belongsToMany(Team::class, 'teams_register_events', 'event_id', 'team_id')
            ->withPivot('points as current_points')
            ->withTimestamps();
    }
}
