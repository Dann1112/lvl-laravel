<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlayerStat;

class PlayerStatController extends Controller
{

    

    public function index(){

        $competitions = \App\Competition::where('status','=','1')->orderBy('name','ASC')->get(['id','name']);

        $stat = 'goals';

        $players = PlayerStat::selectRaw('player, sum(goals) as STAT')
        ->take(60)
        ->groupBy('player')
        ->orderBy('STAT', 'DESC')
        ->paginate(15);

        

        //return $players;

        return view('ranking',compact(['players','stat','competitions']));
    }

    public function show($stat){

        $competitions = \App\Competition::where('status','=','1')
                        ->orderBy('name','ASC')
                        ->get(['id','name']);

        if(request()->has('competition')){
            $comp = request('competition');
            $fixtures = \App\Fixture::where('competition','=',$comp)->pluck('id');
        }



        switch($stat){
            case 'games_played':
            if(!request()->has('competition')){
                $players = PlayerStat::selectRaw('player, count(*) as STAT');
            }else{
                $players = PlayerStat::selectRaw('player, count(*) as STAT')->whereIn('fixture',$fixtures);
            }
                $players = $players->groupBy('player')->take(60)
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            case 'clean_sheets_gk':
                $keepers = \App\Player::where('position','=','GK')->pluck('username');

                if(!request()->has('competition')){
                $players = PlayerStat::selectRaw('player, count(*) as STAT');
                }else{
                $players = PlayerStat::selectRaw('player, count(*) as STAT')->whereIn('fixture',$fixtures);
                }
                $players= $players->whereIn('player',$keepers)->groupBy('player')
                ->where('goals_conceded_gk','=','0')
                ->take(60)
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            case 'goals_conceded_gk': 
            case 'shots_caught_gk':
            case 'shots_driven_gk':
            case 'crosses_caught_gk':
            case 'balls_taken_gk':

            $keepers = \App\Player::where('position','=','GK')->pluck('username');

            if(!request()->has('competition')){
                $players = PlayerStat::selectRaw('player, sum('.$stat.') as STAT');
            }else{
                $players = PlayerStat::selectRaw('player, sum('.$stat.') as STAT')->whereIn('fixture',$fixtures);
            }

                $players = $players->whereIn('player',$keepers)->groupBy('player')
                ->take(60)
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            case 'goals_per_match':
                $keepers = \App\Player::where('position','=','GK')->pluck('username');

                if(!request()->has('competition')){
                $players = PlayerStat::selectRaw('player, (sum(goals_conceded_gk) / count(*)) as STAT');
                }else{
                $players = PlayerStat::selectRaw('player, (sum(goals_conceded_gk) / count(*)) as STAT')->whereIn('fixture',$fixtures);
                }

                $players = $players->groupBy('player')->whereIn('player',$keepers)
                ->take(60)
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            default:
                if(request()->has('competition')){
                    $players = PlayerStat::selectRaw('player, sum('.$stat.') as STAT')->whereIn('fixture',$fixtures);
                } else{
                    $players = PlayerStat::selectRaw('player, sum('.$stat.') as STAT');
                }

                $players = $players->groupBy('player')->orderBy('STAT', 'DESC')->take(60)->paginate(15);
                break;
        }

        return view('ranking',compact(['players','stat','competitions']));
    
    }

    public function showClubs($stat){

        $competitions = \App\Competition::where('status','=','1')->orderBy('name','ASC')->get(['id','name']);

        if(request()->has('competition')){
            $comp = request('competition');
            $fixtures = \App\Fixture::where('competition','=',$comp)->pluck('id');
        }

        

        switch($stat){
            case 'wins':

            

                break;

            case 'loses':
                return 'loses';
                break;

            case 'clean_sheets':
                $keepers = \App\Player::where('position','=','GK')->pluck('username');

                if(!request()->has('competition')){
                    $teams = PlayerStat::selectRaw('teams.name as TEAM, count(*) as STAT')
                    ->join('teams', 'player_stats.team', '=', 'teams.id')->groupBy('teams.name');
                }else{
                    $teams = PlayerStat::selectRaw('teams.name as TEAM, count(*) as STAT')
                    ->join('teams', 'player_stats.team', '=', 'teams.id')->groupBy('teams.name')->whereIn('fixture',$fixtures);
                }

                $teams = $teams->whereIn('player',$keepers)
                ->where('goals_conceded_gk','=','0')
                ->take(60)
                ->orderBy('STAT', 'DESC')
                ->paginate(15);
                break;

            default:
                if(!request()->has('competition')){
                    $teams = PlayerStat::selectRaw('teams.name as TEAM, sum(player_stats.'.$stat.') as STAT')
                    ->join('teams','player_stats.team', '=','teams.id')->groupBy('teams.name')->orderBy('STAT', 'DESC')->take(60)->paginate(15);
                }else{
                    $teams = PlayerStat::selectRaw('teams.name as TEAM, sum(player_stats.'.$stat.') as STAT')
                    ->join('teams','player_stats.team', '=','teams.id')->groupBy('teams.name')->whereIn('fixture',$fixtures)->orderBy('STAT', 'DESC')->take(60)->paginate(15);
                }
                break;
        }

        return view('ranking',compact(['teams','stat','competitions']));
    

    }

    public function newStat(){
        $players = \App\Inscription::orderBy('player','ASC')->pluck('player');
        $competitions = \App\Competition::where('status','0')->orderBy('name','ASC')->get(['id','name']);
        return view('panel.player_stats', compact(['players','competitions']));
    }

    public function store(){

        $fixture = \App\Fixture::where('competition','=',request('competition'))
                                ->where('matchday','=',request('matchday'))
                                ->pluck('id')->first();

        $team = \App\Inscription::where('player','=',request('player'))
                                ->pluck('team')->first();

        //Validates the form
        $this->validate(request(),[

            'player' => 'exists:inscriptions',
            'competition' => 'exists:competitions,id',
            'goals' => 'numeric|min:0',
            'assists' => 'numeric|min:0',
            'shots_on_target' => 'numeric|min:0',
            'shots_away' => 'numeric|min:0',
            'completed_passes' => 'numeric|min:0',
            'failed_passes' => 'numeric|min:0',
            'completed_crosses' => 'numeric|min:0',
            'failed_crosses' => 'numeric|min:0',
            'fouls_received' => 'numeric|min:0',

            'won_tackles' => 'numeric|min:0',
            'failed_tackles' => 'numeric|min:0',
            'fouls' => 'numeric|min:0',
            'penalties_conceded' => 'numeric|min:0',
            'blocks' => 'numeric|min:0',
            'interceptions' => 'numeric|min:0',
            'won_possession' => 'numeric|min:0',
            'lost_possession' => 'numeric|min:0',
            'clearances' => 'numeric|min:0',
            'won_headers' => 'numeric|min:0',
            'lost_headers' => 'numeric|min:0',

            'goals_conceded_gk' => 'numeric|min:0',
            'shots_caught_gk' => 'numeric|min:0',
            'shots_driven_gk' => 'numeric|min:0',
            'crosses_caught_gk' => 'numeric|min:0',
            'balls_taken_gk' => 'numeric|min:0'
        ]);

        //Creates and Saves the team

        $team = PlayerStat::create([
            'fixture' => $fixture,
            'player' => request('player'),
            'team' => $team,
            'goals' => request('goals'),
            'assists' => request('assists'),
            'shots_on_target' => request('shots_on_target'),
            'shots_away' => request('shots_away'),
            'completed_passes' => request('completed_passes'),
            'failed_passes' => request('failed_passes'),
            'completed_crosses' => request('completed_crosses'),
            'failed_crosses' => request('failed_crosses'),
            'fouls_received' => request('fouls_received'),

            'won_tackles' => request('won_tackles'),
            'failed_tackles' => request('failed_tackles'),
            'fouls' => request('fouls'),
            'penalties_conceded' => request('penalties_conceded'),
            'blocks' => request('blocks'),
            'interceptions' => request('interceptions'),
            'won_possession' => request('won_possession'),
            'lost_possession' => request('lost_possession'),
            'clearances' => request('clearances'),
            'won_headers' => request('won_headers'),
            'lost_headers' => request('lost_headers')]);

        return redirect()->route('player_stats');
    }

    

}
