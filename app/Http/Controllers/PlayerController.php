<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $players = Player::orderBy('overall', 'DESC')->take(100)->paginate(15);
        $inscriptions = \App\Inscription::all();
        $teams = \App\Team::all();

        return view('players',compact(['players','inscriptions','teams']));
    }

    public function search()
    {

        $username = request()->filled('username') ? request('username') : '';

        $position = request()->has('position') ? request('position') : '';

        $strong_foot = request()->has('strong_foot') ? request('strong_foot') : '';

        $language = request()->has('language') ? request('language') : '';

        $nationality = request()->has('nationality') ? request('nationality') : '';

        $minPace = request()->filled('minPace') ? request('minPace') : 0;
        $maxPace = request()->filled('maxPace') ? request('maxPace') : 99;

        $minShooting = request()->filled('minShooting') ? request('minShooting') : 0;
        $maxShooting = request()->filled('maxShooting') ? request('maxShooting') : 99;

        $minPassing = request()->filled('minPassing') ? request('minPassing') : 0;
        $maxPassing = request()->filled('maxPassing') ? request('maxPassing') : 99;

        $minDefense = request()->filled('minDefense') ? request('minDefense') : 0;
        $maxDefense = request()->filled('maxDefense') ? request('maxDefense') : 99;

        $minPhysical = request()->filled('minPhysical') ? request('minPhysical') : 0;
        $maxPhysical = request()->filled('maxPhysical') ? request('maxPhysical') : 99;

        $minDribbling = request()->filled('minDribbling') ? request('minDribbling') : 0;
        $maxDribbling = request()->filled('maxDribbling') ? request('maxDribbling') : 99;

        $minOverall = request()->filled('minOverall') ? request('minOverall') : 0;
        $maxOverall = request()->filled('maxOverall') ? request('maxOverall') : 99;

        $minHeight = request()->filled('minHeight') ? request('minHeight') : 150;
        $maxHeight = request()->filled('maxHeight') ? request('maxHeight') : 250;


        $order = request('orderby');

        $players = Player::where([
            ['username', 'like', '%'.$username.'%'],
            ['position', 'like', '%'.$position.'%'],
            ['strong_foot', 'like', '%'.$strong_foot.'%'],
            ['language', 'like', '%'.$language.'%'],
            ['nationality', 'like', '%'.$nationality.'%'],
            ['pace', '>=', $minPace],
            ['pace', '<=', $maxPace],
            ['shooting', '>=', $minShooting],
            ['shooting', '<=', $maxShooting],
            ['dribbling', '>=', $minDribbling],
            ['dribbling', '<=', $maxDribbling],
            ['defense', '>=', $minDefense],
            ['defense', '<=', $maxDefense],
            ['passing', '>=', $minPassing],
            ['passing', '<=', $maxPassing],
            ['physical', '>=', $minPhysical],
            ['physical', '<=', $maxPhysical],
            ['overall', '>=', $minOverall],
            ['overall', '<=', $maxOverall],
            ['height', '>=', $minHeight],
            ['height', '<=', $maxHeight]
        ])->orderBy($order,$order == 'username' ? 'asc' : 'desc')->paginate(15);

            
        return view('players',compact('players'));
    }

    public function editProfile(){

        $player = auth()->user();

        return view('players.edit_profile',compact('player'));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player){

        $date = new Carbon($player->birth_date);
        $age = Carbon::createFromDate($date->year, $date->month, $date->day)->age;

        $date = new Carbon($player->created_at);
        $member_since = $date->toFormattedDateString();

        $temp = \App\Inscription::where('player',$player->username)->first();

        if($temp)
            $team = \App\Team::where('id',($temp->team))->first();
        else
            $team = null;

            //SELECT fix.competition, ins.team, p.player, sum(goals) FROM player_stats p
            //INNER JOIN fixtures fix ON p.fixture = fix.id
            //INNER JOIN inscriptions ins ON ins.player = p.player
            //GROUP BY fix.competition, ins.team, p.player

            $stats = \App\PlayerStat::selectRaw('competitions.name as COMPETITION, YEAR(competitions.start_date) as YEAR, teams.name as TEAM, player_stats.player as PLAYER, count(*) as APPS, sum(player_stats.goals_conceded_gk) as GOALS_CONCEDED, (sum(player_stats.shots_caught_gk) + sum(player_stats.shots_driven_gk)) as SAVES, sum(player_stats.won_tackles) as WON_TACKLES, sum(player_stats.failed_tackles) as FAILED_TACKLES, sum(player_stats.won_possession) as WON_POSSESSION, sum(player_stats.lost_possession) as LOST_POSSESSION, sum(player_stats.assists) as ASSISTS, sum(player_stats.completed_passes) as COMPLETED_PASSES, sum(player_stats.failed_passes) as FAILED_PASSES, sum(player_stats.goals) as GOALS, sum(player_stats.shots_on_target) as SHOTS_ON_TARGET, sum(player_staTs.shots_away) as SHOTS_AWAY')
                    ->join('fixtures','player_stats.fixture','=','fixtures.id')
                    ->join('inscriptions','inscriptions.player','=','player_stats.player')
                    ->join('competitions','competitions.id','=','fixtures.competition')
                    ->join('teams','teams.id','=','player_stats.team')
                    ->where('player_stats.player',$player->username)
                    ->groupBy(['competitions.name','competitions.start_date','teams.name','inscriptions.team','player_stats.player'])
                    ->orderBy('fixtures.competition','ASC')
                    ->get();

        return view('players.profile',compact(['player','stats','age','member_since','team','stats']));
    }

    public function logout(){
        Auth::logout();

        return redirect()->home();
    }

    
}
