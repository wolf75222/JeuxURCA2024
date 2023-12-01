<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTeams extends Model
{
    use HasFactory;
    protected $fillable = ['team_id', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function team() {
        return $this->belongsTo(Team::class);
    }
}
