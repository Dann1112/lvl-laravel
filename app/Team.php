<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class Team extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'abbreviation', 'manager', 'comanager',
        'streaming_channel', 'primary_color',
        'logo','twitter','facebook','twitch','youtube',
        'instagram'
    ];

    
}
