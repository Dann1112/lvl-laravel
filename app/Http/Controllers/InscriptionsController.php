<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Inscription;

class InscriptionsController extends Controller
{

    public function index(){
            $teams = \App\Team::all();
            $players = \App\Player::all();
            return view('panel.player_inscription',compact('teams','players'));
    }

    public function store(){

        $this->validate(request(),[
            'username' => 'unique:inscriptions,player|required',
            'team' => 'required'
        ]);

        Inscription::create([
            'player' => request('username'),
            'team' => request('team')]);

        //\App\Message::where('id',request('message'))->update(['status'=>1]);

        return redirect()->home();
        
    }
}
