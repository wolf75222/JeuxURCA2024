<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function matches()
    {
        return $this->hasMany(Matche::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
