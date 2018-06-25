@extends('dashboards.control')

@section('option_content')

<ul class="nav nav-tabs" id="resultsTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="newResult-tab" data-toggle="tab" href="#newResult" role="tab" >@lang('panel.new')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="editResult-tab" data-toggle="tab" href="#editResult" role="tab">@lang('panel.edit')</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="deleteResult-tab" data-toggle="tab" href="#deleteResult" role="tab">@lang('panel.delete')</a>
        </li>
</ul>

<div class="tab-content" id="ResultTabContent">

    <div class="tab-pane fade show active" id="newResult" role="tabpanel" aria-labelledby="tab-fixture">
        <hr class="border" style="color:white">
        <h3 class="text-center" style="width:100%">@lang('panel.new_result')</h3>
        <hr class="border" style="color:white">

        @include('layouts.errors')


      <form class="text-center" method="POST" action="{{route('results')}}" enctype="multipart/form-data">

        {{csrf_field()}}

            <div class="form-row text-center my-2">
              <label class="col-form-label col-2" for="competition">@lang('panel.competition')&nbsp<span class="text-danger">*</span></label>
              <select class="form-control col-4" name="competition">
                  <option selected disabled hidden>@lang('panel.choose_option')</option>
                  @foreach($competition as $comp)
                    <option value="{{$comp->id}}">{{$comp->name}}</option>
                  @endforeach
              </select>
              <br>
            <label class="col-form-label col-2 " for="start_date">@lang('panel.status')&nbsp<span class="text-danger">*</span></label>
            <select class="form-control col-2" name="status">
                    <option value="0">@lang('panel.unstarted')</option>
                    <option selected value="1">@lang('panel.live')</option>
                    <option value="2">@lang('panel.finished')</option>
                    <option value="3">@lang('panel.postponed')</option>
              </select>
            </div>

            <hr class="border" style="color:white">

            <div class="form-row text-center justify-content-around my-2">
              <select class="form-control col-3" name="home_team">
                  <option selected disabled hidden>@lang('panel.home_team')</option>
                  @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                  @endforeach
              </select>
              <input class="form-control col-1" type="number" value="0" name="home_goals" placeholder="@lang('panel.home')">
              <span class="col-1" >VS</span>
              <input class="form-control col-1" type="number" value="0" name="away_goals" placeholder="@lang('panel.away')">
              <select class="form-control col-3" name="away_team">
                    <option selected disabled hidden>@lang('panel.away_team')</option>
                    @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                  @endforeach
                </select>

            </div>

            <hr class="border" style="color:white">
            <button type="submit" class="btn btn-primary btn-lg my-3" style="width:50%">@lang('panel.add')</button>
      </form>


    </div>

</div>




    
  @endsection