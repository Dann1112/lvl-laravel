@extends('layouts.layout')

@section('content')

  <div class="row d-flex my-3 col-sm-10 col-12 mx-auto" style="background-color: black">

    <div class="p-3 col-md-4 col-12 border-radius rounded" style="background-color: black">

        <div id="accordion" role="tablist">
        <div class="card" style="background-color: rgba(255,255,255,.2)">
          <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
              <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne" style="color: white">@lang('ranking.general')
              </a>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <a href="/ranking/goals"> <button name="goalsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.goals')</button></a>
              <a href="/ranking/assists"> <button name="assistsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.assists')</button></a>
                <a href="/ranking/games_played"> <button name="playedBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.games_played')</button></a>
                <a href="/ranking/yellow_cards"> <button name="yellowCardsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.yellow_cards')</button></a>
                <a href="/ranking/red_cards"> <button name="redCardsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.red_cards')</button></a>
            </div>
          </div>
        </div>


        <div class="card"  style="background-color: rgba(255,255,255,.2)">
          <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo"  style="color: white">
                @lang('ranking.attacking')
              </a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              <a href="/ranking/shots_on_target"> <button name="" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.shots_on_target')</button></a>
              <a href="/ranking/shots_away"> <button name="" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.shots_away')</button></a>
              <a href="/ranking/completed_passes"> <button name="" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.completed_passes')</button></a>
              <a href="/ranking/failed_passes"> <button name="" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.failed_passes')</button></a>
              <a href="/ranking/completed_crosses"> <button name="" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.completed_crosses')</button></a>
              <a href="/ranking/failed_crosses"> <button name="" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.failed_crosses')</button></a>
              <a href="/ranking/fouls_received"> <button name="" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.fouls_received')</button></a>

            </div>
          </div>
        </div>

        <div class="card" style="background-color: rgba(255,255,255,.2)">
          <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree" style="color: white">
                @lang('ranking.defense')
              </a>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              <a href="/ranking/won_tackles"> <button name="tacklesBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.won_tackles')</button></a>
              <a href="/ranking/failed_tackles"> <button name="tacklesBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.failed_tackles')</button></a>
              <a href="/ranking/blocks"> <button name="interceptionsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.blocks')</button></a>
              <a href="/ranking/interceptions"> <button name="interceptionsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.interceptions')</button></a>
              <a href="/ranking/won_possession"> <button name="interceptionsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.won_possession')</button></a>
              <a href="/ranking/lost_possession"> <button name="interceptionsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.lost_possession')</button></a>
              <a href="/ranking/clearances"> <button name="interceptionsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.clearances')</button></a>
              <a href="/ranking/won_headers"> <button name="headersWonBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.won_headers')</button></a>
              <a href="/ranking/lost_headers"> <button name="headersWonBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.lost_headers')</button></a>
              <a href="/ranking/conceded_penalties"> <button name="penaltiesConcededBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.conceded_penalties')</button></a>
              <a href="/ranking/fouls"> <button name="foulsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.fouls')</button></a>
            </div>
          </div>
        </div>

        <div class="card" style="background-color: rgba(255,255,255,.2)">
          <div class="card-header" role="tab" id="headingFour">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour" style="color: white">
                @lang('ranking.goalkeeper')
              </a>
            </h5>
          </div>
          <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
               <a href="/ranking/clean_sheets_gk"> <button name="cleanSheetBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.clean_sheets_gk')</button></a>
              <a href="/ranking/goals_conceded_gk"> <button name="goalsConcededBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.goals_conceded_gk')</button></a>
              <a href="/ranking/shots_caught_gk"> <button name="savesBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.shots_caught_gk')</button></a>
              <a href="/ranking/shots_driven_gk"> <button name="penaltiesSavedBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.shots_driven_gk')</button></a>
              <a href="/ranking/crosses_caught_gk"> <button name="1on1WonBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.crosses_caught_gk')</button></a>
              <a href="/ranking/balls_taken_gk"> <button name="1on1LostBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.balls_taken_gk')</button></a>
              <a href="/ranking/goals_per_match"> <button name="goalsConcededPerMatchBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.goals_per_match')</button></a>
            </div>
          </div>
        </div>

        <div class="card" style="background-color: rgba(255,255,255,.2)">
            <div class="card-header" role="tab" id="headingFive">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="false" aria-controls="collapseFive" style="color: white">
                    @lang('ranking.clubs')
                </a>
              </h5>
            </div>
            <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                 <a href="/ranking/clubs/wins"> <button name="winsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.wins')</button></a>
                  <a href="/ranking/clubs/loses"> <button name="losesBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.loses')</button></a>
                  <a href="/ranking/clubs/goals"> <button name="goalsClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.goals')</button></a>
                  <a href="/ranking/clubs/yellow_cards"> <button name="yellowCardsClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.yellow_cards')</button></a>
                  <a href="/ranking/clubs/red_cards"> <button name="redCardsClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.red_cards')</button></a>
                  <a href="/ranking/clubs/shots_on_target"> <button name="shotsOnTargetClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.shots_on_target')</button></a>
                  <a href="/ranking/clubs/shots_away"> <button name="shotsOnTargetClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.shots_away')</button></a>
                  <a href="/ranking/clubs/completed_passes"> <button name="completedPassesClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.completed_passes')</button></a>
                  <a href="/ranking/clubs/failed_passes"> <button name="completedPassesClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.failed_passes')</button></a>
                  <a href="/ranking/clubs/succesful_crosses"> <button name="succesfulCrossesClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.completed_crosses')</button></a>
                  <a href="/ranking/clubs/failed_crosses"> <button name="succesfulCrossesClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.failed_crosses')</button></a>
                  <a href="/ranking/clubs/clean_sheets"> <button name="cleanSheetsClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.clean_sheets_gk')</button></a>
                  <a href="/ranking/clubs/fouls"> <button name="foulsClubsBtn" class="btn btn-outline-light btn-lg text-left" style="width: 100%">@lang('ranking.fouls')</button></a>
              </div>
            </div>
        </div>

        </div>
    </div>


    <div class="col-md-8 col-12 px-md-3 py-md-0 py-3 px-3 text-center" style="background-color: black">

      <hr style="border-color: white">
      <h1 class="display-4" style="color: white">Top @lang('ranking.'.$stat.'')</h1>
      <hr style="border-color: white">

      @if(isset($teams))
        <form class="col-12 row my-2" method="GET" action='/ranking/clubs/{{$stat}}' enctype="multipart/form-data">
      @else
        <form class="col-12 row my-2" method="GET" action='/ranking/{{$stat}}' enctype="multipart/form-data">
      @endif
            <label class="col-form-label ml-auto col-2" for="competition">@lang('panel.competition')&nbsp: </label>
              <select class="form-control col-3" name="competition">
                    <option selected disabled hidden>@lang('panel.choose_option')</option>
                  @foreach($competitions as $comp)
                    <option value="{{$comp->id}}">{{$comp->name}}</option>
                  @endforeach
              </select>
              <button type="submit" class="btn btn-primary btn-lg ml-2">@lang('panel.show')</button>
      </form>

      <table class="table table-dark table-striped table-hover table-responsive-xl">
        <thead class="thead-dark">
            

            <tr class="text-center">
              @if(isset($teams))
                <th>@lang('ranking.position')</th><!-- FOTO -->
                <th>@lang('ranking.team')</th>
                <th>@lang('ranking.stat')</th>
              @else
                <th>@lang('ranking.position')</th><!-- FOTO -->
                <th>@lang('ranking.name')</th>
                <th>@lang('ranking.team')</th>
                <th>@lang('ranking.stat')</th>
              @endif
              </tr>

        </thead>
        <tbody>
          <?php $cont = 1;?>

        @if(isset($teams))
        
          @foreach($teams as $team)
          
          <tr class="text-center">
          <th class="align-middle" style="text">{{($teams->currentPage()-1) * $teams->perPage() + $cont++}}°</th>
              <td class="align-middle">{{$team->TEAM}}</td>
              <td class="align-middle">{{$team->STAT}}</td>
          </tr>
          @endforeach
        @else

          @php $place = 0;@endphp
          @foreach($players as $player)
          @php $place++; @endphp
          @if($place==1)
          <tr class="text-center bg-success">
          @else
          <tr class="text-center">
          @endif
          
          <th class="align-middle" style="text">{{($players->currentPage()-1) * $players->perPage() + $cont++}}°</th>
              <td class="align-middle">{{$player->player}}</td>

              <?php $ts = \App\Inscription::where('player',$player->player)->get();
                  if($ts->count() > 0){
                        foreach ($ts as $t){
                          $ts2 = \App\Team::where('id',$t->team)->get();
                          foreach($ts2 as $t2){
                            echo('<td class="img-fluid"><span class="badge" style="background-color:'.$t2->primary_color.'; color:black; font-weight:bold">'.$t2->name.'</span></td>');
                          }
                        }
                      }
                      else{
                        echo('<td>N/A</td>');
                      }
                ?>

                <td class="align-middle">{{$player->STAT}}</td>
              
          </tr>
          @endforeach
          @endif
          
        </tbody>
      </table>

      @if(isset($teams))
        {{ $teams->links() }}
      @else
        {{ $players->links() }}
      @endif
    </div>

  </div>

  @endsection