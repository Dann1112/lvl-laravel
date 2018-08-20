<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Standing;

class HomeController extends Controller
{

    public function index(){

        //Looks for the id of active competitions so we can look for the standings of those matches
        $active = \App\Competition::where('status','0')->pluck('id')->first();

        //Looks for the standings of the teams in those competitions
        $standings = \App\Standing::where('competition','=',$active)->orderBy('points','DESC')->orderBy('goal_difference','DESC')->orderBy('goals_for','DESC')->orderBy('goals_against','ASC')->get();

        //Looks for the name of the teams in those competitions to look for their info in Teams table
        $teamsInStandings = \App\Standing::where('competition','=',$active)->pluck('team');

        //Looks for the full info of the teams involved
        $teams = \App\Team::whereIn('id',$teamsInStandings)->get();

        return view ('home2',compact('standings','teams'));
    }

    
}
