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
              <label class="col-form-label col-2" for="competition">@lang('panel.competition')&nbsp<span class="text-danger">*</span></label>
              <select class="form-control col-3" name="competition">
                  <option selected disabled hidden>@lang('panel.choose_option')</option>
                  
              </select>
              <label class="col-form-label col-1 " for="matchday">@lang('panel.matchday')&nbsp<span class="text-danger">*</span></label>
              <input class="form-control col-2" type="text" name="matchday">
              <label class="col-form-label col-1 " for="player">@lang('panel.player')&nbsp<span class="text-danger">*</span></label>
              <select class="form-control col-3" name="player">
                <option selected disabled hidden>@lang('panel.choose_option')</option>
                
            </select>
              <br>
            </div>

            <hr class="border" style="color:white">

            <div class="form-row text-center justify-content-around my-2">
              <div class="container col-5 d-flex-column p-3 border rounded">
                <h3>@lang('panel.attack')</h3>
                <hr>
                <div class="container col-11 d-flex ">
                  <label class="col-form-label col-6 " for="goals">@lang('panel.goals')</label>
                  <input class="form-control col-6" type="number" name="goals" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 " for="assists">@lang('panel.assists')</label>
                    <input class="form-control col-6" type="number" name="assists" value="0">
                </div>
                <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 " for="shots_on_target">@lang('panel.shots_on_target')</label>
                    <input class="form-control col-6" type="number" name="shots_on_target" value="0">
                </div>
                


                
              </div>
                
                
              <div class="container col-5 d-flex-column p-3 border rounded">
                  <h3>@lang('panel.defense')</h3>
                  <hr>
                  <div class="container col-11 d-flex ">
                    <label class="col-form-label col-6 " for="won_tackles">@lang('panel.won_tackles')</label>
                    <input class="form-control col-6" type="number" name="won_tackles" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 " for="interceptions">@lang('panel.interceptions')</label>
                      <input class="form-control col-6" type="number" name="interceptions" value="0">
                  </div>
                  <div class="container col-11 d-flex ">
                      <label class="col-form-label col-6 " for="blocks">@lang('panel.blocks')</label>
                      <input class="form-control col-6" type="number" name="blocks" value="0">
                  </div>
                  
  
  
                  
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg my-3" style="width:50%">@lang('panel.save')</button>
      </form>


    </div>

</div>




    
  @endsection