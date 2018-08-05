<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'player', 'competition', 'fixture','team',

        //Atack
        'goals', 'shots_on_target', 'shots_away','assists','completed_passes', 'failed_passes',
        'completed_crosses', 'failed_crosses','fouls_received',

        //Defense
        'won_tackles', 'failed_tackles','fouls','conceded_penalties','interceptions','blocks',
        'won_possession', 'lost_possession','clearances','won_headers','lost_headers',

        //Goalkeeper
        'goals_conceded_gk','shots_caught_gk','shots_driven_gk',
        'crosses_caught_gk','balls_taken_gk'
    ];

}
