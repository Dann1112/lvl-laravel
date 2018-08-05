@extends('dashboards.control')

@section('option_content')

<ul class="nav nav-tabs" id="fixturesTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="newFixture-tab" data-toggle="tab" href="#newFixture" role="tab" >@lang('panel.new')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="editFixture-tab" data-toggle="tab" href="#editFixture" role="tab">@lang('panel.edit')</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="deleteFixture-tab" data-toggle="tab" href="#deleteFixture" role="tab">@lang('panel.delete')</a>
        </li>
</ul>

<div class="tab-content" id="FixtureTabContent">

    <div class="tab-pane fade show active" id="newFixture" role="tabpanel" aria-labelledby="tab-fixture">
        <hr class="border" style="color:white">
        <h3 class="text-center" style="width:100%">@lang('panel.new_player_stat')</h3>
        <hr class="border" style="color:white">

        @include('layouts.errors')


      <form class="text-center" method="POST" action="{{route('player_stats')}}" enctype="multipart/form-data">

        {{csrf_field()}}

            <div class="form-row text-center my-2">
              <label class="col-form-label col-2 text-light" for="competition">@lang('panel.competition')&nbsp<span class="text-danger">*</span></label>
              <select class="form-control col-3" name="competition">
                    <option selected disabled hidden>@lang('panel.choose_option')</option>
                  @foreach($competitions as $comp)
                    <option value="{{$comp->id}}">{{$comp->name}}</option>
                  @endforeach
                  
                  
              </select>
              <label class="col-form-label col-1  text-light" for="matchday">@lang('panel.matchday')&nbsp<span class="text-danger">*</span></label>
              <input class="form-control col-2" type="text" name="matchday">
              <label class="col-form-label col-1  text-light" for="player">@lang('panel.player')&nbsp<span class="text-danger">*</span></label>
              <select class="form-control col-3" name="player">
                <option selected disabled hidden>@lang('panel.choose_option')</option>
                @foreach($players as $player)
                    <option value="{{$player}}">{{$player}}</option>
                  @endforeach
                
            </select>
              <br>
            </div>

            <hr class="border" style="color:white">

            <div class="form-row text-center justify-content-around my-2">
              <div class="container col-5 d-flex-column p-3 border rounded">
                <h3>@lang('panel.attack')</h3>
                <hr>
                <div class="container col-11 d-flex ">
                  <label class="col-form-label col-6  text-light" for="goals">@lang('panel.goals')</label>
                  <input class="form-control col-6" type="number" name="goals" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="shots_on_target">@lang('panel.shots_on_target')</label>
                    <input class="form-control col-6" type="number" name="shots_on_target" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="shots_away">@lang('panel.shots_away')</label>
                    <input class="form-control col-6" type="number" name="shots_away" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="assists">@lang('panel.assists')</label>
                    <input class="form-control col-6" type="number" name="assists" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="completed_passes">@lang('panel.completed_passes')</label>
                    <input class="form-control col-6" type="number" name="completed_passes" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="failed_passes">@lang('panel.failed_passes')</label>
                    <input class="form-control col-6" type="number" name="failed_passes" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="completed_crosses">@lang('panel.completed_crosses')</label>
                    <input class="form-control col-6" type="number" name="completed_crosses" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="failed_crosses">@lang('panel.failed_crosses')</label>
                    <input class="form-control col-6" type="number" name="failed_crosses" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="fouls_received">@lang('panel.fouls_received')</label>
                    <input class="form-control col-6" type="number" name="fouls_received" value="0">
                </div>
                
              
                
                


                
              </div>
                
                
              <div class="container col-5 d-flex-column p-3 border rounded">
                  <h3>@lang('panel.defense')</h3>
                  <hr>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6  text-light" for="won_tackles">@lang('panel.won_tackles')</label>
                      <input class="form-control col-6" type="number" name="won_tackles" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6  text-light" for="failed_tackles">@lang('panel.failed_tackles')</label>
                    <input class="form-control col-6" type="number" name="failed_tackles" value="0">
                </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="fouls">@lang('panel.fouls')</label>
                      <input class="form-control col-6" type="number" name="fouls" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="conceded_penalties">@lang('panel.conceded_penalties')</label>
                      <input class="form-control col-6" type="number" name="conceded_penalties" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="interceptions">@lang('panel.interceptions')</label>
                      <input class="form-control col-6" type="number" name="interceptions" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="blocks">@lang('panel.blocks')</label>
                      <input class="form-control col-6" type="number" name="blocks" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="won_possession">@lang('panel.won_possession')</label>
                      <input class="form-control col-6" type="number" name="won_possession" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="lost_possession">@lang('panel.lost_possession')</label>
                      <input class="form-control col-6" type="number" name="lost_possession" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="clearances">@lang('panel.clearances')</label>
                      <input class="form-control col-6" type="number" name="clearances" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="won_headers">@lang('panel.won_headers')</label>
                      <input class="form-control col-6" type="number" name="won_headers" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 text-light " for="lost_headers">@lang('panel.lost_headers')</label>
                      <input class="form-control col-6" type="number" name="lost_headers" value="0">
                  </div>
                </div>
            </div>

            <div class="container col-5 d-flex-column p-3 border rounded" style="color:white">
                <h3>@lang('panel.goalkeeper')</h3>
                <hr>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 text-light " for="goals_conceded_gk">@lang('panel.goals_conceded')</label>
                    <input class="form-control col-6" type="number" name="goals_conceded_gk" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 text-light " for="shots_caught_gk">@lang('panel.shots_caught')</label>
                    <input class="form-control col-6" type="number" name="shots_caught_gk" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 text-light " for="shots_driven_gk">@lang('panel.shots_driven')</label>
                    <input class="form-control col-6" type="number" name="shots_driven_gk" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 text-light " for="crosses_caught_gk">@lang('panel.crosses_caught')</label>
                    <input class="form-control col-6" type="number" name="crosses_caught_gk" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 text-light " for="balls_taken_gk">@lang('panel.balls_taken')</label>
                    <input class="form-control col-6" type="number" name="balls_taken_gk" value="0">
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-lg my-3 mx-aut" style="width:50%">@lang('panel.save')</button>
          </div>

            
      </form>


    </div>

</div>




    
  @endsection