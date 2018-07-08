<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'goals', 'fixture','player','team', 'assists', 'shots_on_target',
        'blocks', 'won_tackles', 'interceptions'
    ];

}
