<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Standing;

class StandingsController extends Controller
{

    public function index(){

        //Looks for the id of active competitions so we can look for the standings of those matches
        $active = \App\Competition::where('status','0')->pluck('id')->first();

        //Looks for the standings of the teams in those competitions
        $standings = \App\Standing::where('competition','=',$active)->orderBy('points','DESC')->get();

        //Looks for the name of the teams in those competitions to look for their info in Teams table
        $teamsInStandings = \App\Standing::where('competition','=',$active)->pluck('team');

        //Gets the info of the active competitions
        $competition = \App\Competition::where('id','=',$active)->first();

        //Looks for the full info of the teams involved
        $teams = \App\Team::whereIn('id',$teamsInStandings)->get();

        $competitions = \App\Competition::whereIn('status',['0','1'])
                        ->orderBy('name','ASC')
                        ->get(['id','name']);

        return view ('standings',compact('standings','competition','teams','competitions'));
    }

    public function show($id){

        //Looks for the standings of the teams in those competitions
        $standings = \App\Standing::where('competition','=',$id)->orderBy('points','DESC')->get();

        //Looks for the name of the teams in those competitions to look for their info in Teams table
        $teamsInStandings = \App\Standing::where('competition','=',$active)->pluck('team');

        //Gets the info of the active competitions
        $competition = \App\Competition::where('id','=',$active)->first();

        //Looks for the full info of the teams involved
        $teams = \App\Team::whereIn('id',$teamsInStandings)->get();

        $competitions = \App\Competition::whereIn('status',['0','1'])
                        ->orderBy('name','ASC')
                        ->get(['id','name']);

        return view ('standings',compact('standings','competition','teams','competitions'));


    }

    public function create(){
        $competitions = \App\Competition::all();
        $teams = \App\Team::all();
        return view('panel.inscriptions',compact('competitions','teams'));
    }

    public function store(){

        $this->validate(request(),[
            'competition' => 'required',
            'team' => 'required|string'
        ]);

        Standing::create([
            'competition' => request('competition'),
            'team' => request('team')
        ]);

        return redirect()->home();


    }
}
