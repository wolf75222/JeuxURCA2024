<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phase_id',
        // Add any other columns that your group table may have
    ];

    public function teams()
    {
        return $this->hasMany(GroupTeams::class);
    }

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }
}
