<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', // Assurez-vous que ce champ est inclus
        'members_count',
        'password',
        'points',
        'medailles',
        'degree_id', // Assurez-vous que ce champ est inclus si vous utilisez degree_id dans la requête
        'color',

        // Add more fields as needed
    ];

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

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function matches()
    {
        return $this->hasMany(Matche::class);
    }

    
}
