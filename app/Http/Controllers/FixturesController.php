<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Competition;
use \App\Team;
use \App\Fixture;

class FixturesController extends Controller
{
    public function create(){

        $competition = Competition::where('status','0')->select(['id','name'])->get();
        $teams = Team::select(['id','name'])->get();

        return view ('panel.fixtures',compact('competition','teams'));
    }

    public function results(){
        $competition = Competition::where('status','0')->select(['id','name'])->get();
        $teams = Team::select(['id','name'])->get();

        return view ('panel.results',compact('competition','teams'));
    }

    public function saveResults(){

        $home = \App\Standing::where('team','=',request('home_team'))->first();
        $away = \App\Standing::where('team','=',request('away_team'))->first();

        //Calculation for new values for standings table
        $homeGamesPlayed = $home->games_played + 1;
        $homeGoalsFor = $home->goals_for + request('home_goals');
        $homeGoalsAgainst = $home->goals_against + request('away_goals');
        $homeGoalDifference = $homeGoalsFor - $homeGoalsAgainst;
        $homeWonGames = 0;
        $homeTiedGames = 0;
        $homeLostGames = 0;

        $awayGamesPlayed = $away->games_played + 1;
        $awayGoalsFor = $away->goals_for + request('away_goals');
        $awayGoalsAgainst = $away->goals_against + request('home_goals');
        $awayGoalDifference = $awayGoalsFor - $awayGoalsAgainst;
        $awayWonGames = 0;
        $awayTiedGames = 0;
        $awayLostGames = 0;

        //Home team beats away team
        if(request('home_goals') > request('away_goals')){
            $homePoints = 3;
            $homeWonGames = 1;
            $awayLostGames = 1;
            $awayPoints = 0;
            
        } else if (request('home_goals') < request('away_goals')){
            $homePoints = 0;
            $awayPoints = 3;
            $awayWonGames = 1;
            $homeLostGames = 1;

        }else{
            $homePoints = 1;
            $homeTiedGames = 1;
            $awayPoints = 1;
            $awayTiedGames = 1;
        }

        $homePoints = $home->points + $homePoints;
        $awayPoints = $away->points + $awayPoints;

        \App\Fixture::where([
            ['home_team', '=', request('home_team')],
            ['away_team', '=', request('away_team')]])
                    ->update([
                    'home_goals'=>request('home_goals'),
                    'away_goals'=>request('away_goals'),
                    'status' => 2
            ]);
        
            \App\Standing::where('team','=',request('home_team'))->update([
            'games_played'=> $homeGamesPlayed,
            'goals_for' => $homeGoalsFor,
            'goals_against' => $homeGoalsAgainst,
            'goal_difference' => $homeGoalDifference,
            'points' => $homePoints,
            'games_won' => $home->games_won + $homeWonGames,
            'games_tied' => $home->games_tied + $homeTiedGames,
            'games_lost' => $home->games_lost + $homeLostGames
        ]);

        \App\Standing::where('team','=',request('away_team'))->update([
            'games_played'=> $awayGamesPlayed,
            'goals_for' => $awayGoalsFor,
            'goals_against' => $awayGoalsAgainst,
            'goal_difference' => $awayGoalDifference,
            'points' => $awayPoints,
            'games_won' => $away->games_won + $awayWonGames,
            'games_tied' => $away->games_tied + $awayTiedGames,
            'games_lost' => $away->games_lost + $awayLostGames
        ]);


        return redirect()->route('results');

    }

    public function store(){

        $this->validate(request(),[
            'competition' => 'required',
            'matchday' => 'required|min:0',
            'status' => 'required',
            'home_team' => 'required',
            'away_team' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        Fixture::create([
            'competition' => request('competition'),
            'matchday' => request('matchday'),
            'status' => request('status'),
            'home_team' => request('home_team'),
            'away_team' => request('away_team'),
            'date' => request('date'),
            'time' => request('time'),
        ]);

        return redirect()->route('fixtures');

    }
}
