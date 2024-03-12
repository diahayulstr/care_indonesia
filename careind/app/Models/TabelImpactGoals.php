<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelImpactGoals extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'impact_goals_id');
    }

    // public function proposals()
    // {
    //     return $this->belongsToMany(Proposal::class, 'impact_goal_proposal', 'impact_goal_id', 'proposal_id');
    // }

 

}
