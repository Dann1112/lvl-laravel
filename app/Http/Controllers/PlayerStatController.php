<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlayerStat;

class PlayerStatController extends Controller
{
    public function index(){

        $stat = 'goals';

        $players = PlayerStat::selectRaw('player, sum(goals) as STAT')
        ->take(60)
        ->groupBy('player')
        ->orderBy('STAT', 'DESC')
        ->paginate(15);

        //return $players;

        return view('ranking',compact(['players','stat']));
    }

    public function show($stat){

        /*if($stat === 'games_played'){
            $players = PlayerStat::take(100)->paginate(20);
        }
        else
        $players = PlayerStat::where($stat,'>',0)->orderBy($stat,'desc')->take(100)->paginate(20);

        return view('ranking',compact(['players','stat']));*/

        switch($stat){
            case 'games_played':
                $players = PlayerStat::selectRaw('player, count(*) as STAT')
                ->take(60)
                ->groupBy('player')
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            case 'clean_sheets_gk':
                $keepers = \App\Player::where('position','=','GK')->pluck('username');

                $players = PlayerStat::selectRaw('player, count(*) as STAT')
                ->whereIn('player',$keepers)
                ->where('goals_conceded_gk','=','0')
                ->take(60)
                ->groupBy('player')
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            case 'goals_conceded_gk': 
            case 'shots_caught_gk':
            case 'shots_driven_gk':
            case 'crosses_caught_gk':
            case 'balls_taken_gk':

            $keepers = \App\Player::where('position','=','GK')->pluck('username');

                $players = PlayerStat::selectRaw('player, sum('.$stat.') as STAT')
                ->whereIn('player',$keepers)
                ->take(60)
                ->groupBy('player')
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            case 'goals_per_match':
                $keepers = \App\Player::where('position','=','GK')->pluck('username');

                $players = PlayerStat::selectRaw('player, (sum(goals_conceded_gk) / count(*)) as STAT')
                ->whereIn('player',$keepers)
                ->take(60)
                ->groupBy('player')
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            default:
                $players = PlayerStat::selectRaw('player, sum('.$stat.') as STAT')
                ->take(60)
                ->groupBy('player')
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;
        }

        return view('ranking',compact(['players','stat']));
    
    }

    public function showClubs($stat){

        switch($stat){
            case 'wins':
                return 'wins';
                break;

            case 'loses':
                return 'loses';
                break;

            case 'goals':
            case 'yellow_cards':
            case 'red_cards':
            case 'shots_on_target':
            case 'shots_away':
            case 'completed_passes':
            case 'failed_passes':
            case 'succesful_crosses':
            case 'failed_crosses':
            case 'fouls':
                $teams = PlayerStat::selectRaw('teams.name as TEAM, sum(player_stats.'.$stat.') as STAT')
                ->join('teams','player_stats.team', '=','teams.id')
                ->take(60)
                ->groupBy('teams.name')
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            case 'clean_sheets':
                $keepers = \App\Player::where('position','=','GK')->pluck('username');
                $teams = PlayerStat::selectRaw('teams.name as TEAM, count(*) as STAT')
                ->join('teams', 'player_stats.team', '=', 'teams.id')
                ->whereIn('player',$keepers)
                ->where('goals_conceded_gk','=','0')
                ->take(60)
                ->groupBy('teams.name')
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;
        }

        return view('ranking',compact(['teams','stat']));
    

    }

    public function newStat(){
        return view('panel.player_stats');
    }

    public function store(){

        //Validates the form
        $this->validate(request(),[
            'goals' => 'numeric|min:0',
            'assists' => 'numeric|min:0',
            'shots_on_target' => 'numeric|min:0',
            'blocks' => 'numeric|min:0',
            'interceptions' => 'numeric|min:0',
            'won_tackles' => 'numeric|min:0',
        ]);

        //Creates and Saves the team

        $team = PlayerStat::create([
            'fixture' => "1",
            'player' => "Dann1112",
            'team' => "1",
            'goals' => request('goals'),
            'assists' => request('assists'),
            'shots_on_target' => request('shots_on_target'),
            'blocks' => request('blocks'),
            'interceptions' => request('interceptions'),
            'won_tackles' => request('won_tackles')]);

        return redirect()->home();
    }

    

}
