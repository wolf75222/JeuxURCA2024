<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'degree', 'color', 'password', 'members_count'];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'team_event', 'team_id', 'event_id')
            ->withPivot('preferred_order')
            ->withTimestamps();
    }
}
