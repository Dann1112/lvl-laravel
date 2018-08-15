@extends('layouts.layout')

@section('content')

<!-- Filter Options-->
<div class="container-fluid py-3 col-sm-10 col-12 mx-auto my-3 contenedor">

        <!-- Table -->
        <div class="container-fluid">

           <table class="table table-striped table-dark table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">@lang('standings.pos')</th>
                    <th scope="col">@lang('standings.team')</th>
                    <th scope="col">@lang('standings.GP')</th>
                    <th scope="col" class="d-none d-sm-table-cell">@lang('standings.W')</th>
                    <th scope="col" class="d-none d-sm-table-cell">@lang('standings.D')</th>
                    <th scope="col" class="d-none d-sm-table-cell">@lang('standings.L')</th>
                    <th scope="col">@lang('standings.GD')</th>
                    <th scope="col" class="d-none d-sm-table-cell">@lang('standings.GF')</th>
                    <th scope="col" class="d-none d-sm-table-cell">@lang('standings.GA')</th>
                    <th scope="col">@lang('standings.PTS')</th>
                  </tr>
                </thead>
                <tbody>
                  @php $cont = 0;@endphp
                  @foreach($standings as $stand)
                  @php $cont++; @endphp

                  @foreach($teams as $team)
                  @if($stand->team == $team->id)
                  @if($cont==1)
                    <tr class="clickable-row" data-href="/teams/{{$team->id}}" style="background-color:lawngreen; color:black; cursor:pointer">
                    @elseif($cont<=5)
                    <tr class="clickable-row" data-href="/teams/{{$team->id}}" style="background-color:skyblue ; color:black; cursor:pointer">
                    @else
                    <tr class="clickable-row" data-href="/teams/{{$team->id}}" style="cursor:pointer">
                      @endif
                        <!--<th scope="row">{{$stand->position}}&nbsp<i class="fa fa-caret-up"></i></th>-->
                        <td>{{$cont}}°</td>
                    <!-- <td><img src="/storage/{{$team->logo}}" style="max-height: 20px; max-width: 20px"> -->
                    <td style="font-weight:bold"><i class="fas fa-circle" style="color: {{$team->primary_color}}"></i>
                        <span class="d-none d-sm-inline">&#160&#160{{$team->name}}</span>
                          <span class="d-inline d-sm-none">{{$team->abbreviation}}</span></td>
                        <td style="font-weight: bold">{{$stand->games_played}}</td>
                        <th scope="col" class="d-none d-sm-table-cell" style="font-weight:normal">{{$stand->games_won}}</th>
                        <th scope="col" class="d-none d-sm-table-cell" style="font-weight:normal">{{$stand->games_tied}}</th>
                        <th scope="col" class="d-none d-sm-table-cell" style="font-weight:normal">{{$stand->games_lost}}</th>
                        
                        @if($stand->goal_difference > 0) <td style="font-weight:normal">+{{$stand->goal_difference}}</td>
                        @elseif($stand->goal_difference < 0) <td style="font-weight:normal">-{{$stand->goal_difference}}</td>
                        @endif
                        <th scope="col" class="d-none d-sm-table-cell" style="font-weight:normal">{{$stand->goals_for}}</th>
                        <th scope="col" class="d-none d-sm-table-cell" style="font-weight:normal">{{$stand->goals_against}}</th>
                        <td class="font-weight-bold">{{$stand->points}}</td>
                      </tr>
                      @else
                      @continue
                      @endif
                      @endforeach
                  @endforeach
                  
                </tbody>
              </table>
          
        </div>
    
        <p class="text-left pl-3" style="width: 100%; color: white">
          <span class="badge" style="background-color: lawngreen; color:black ">*@lang('standings.team')*</span> -> @lang('standings.first')<br>
          <span class="badge" style="background-color: skyblue; color:black">*@lang('standings.team')*</span> -> @lang('standings.playoffs')<br>
        <span class="font-weight-bold">@lang('standings.pos')</span>:  @lang('standings.pos_info')<br>
        <span class="font-weight-bold">@lang('standings.GP')</span>: @lang('standings.GP_info')<br>
        <span class="font-weight-bold">@lang('standings.W')</span>: @lang('standings.W_info')<br>
        <span class="font-weight-bold">@lang('standings.D')</span>: @lang('standings.D_info')<br>
        <span class="font-weight-bold">@lang('standings.L')</span>: @lang('standings.L_info')<br>
        <span class="font-weight-bold">@lang('standings.GD')</span>: @lang('standings.GD_info')<br>
        <span class="font-weight-bold">@lang('standings.GF')</span>: @lang('standings.GF_info')<br>
        <span class="font-weight-bold">@lang('standings.GA')</span>: @lang('standings.GA_info')<br>
        <span class="font-weight-bold">@lang('standings.PTS')</span>: @lang('standings.PTS_info')<br>
        </p>

        <script>
          jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
      </script>
    
      </div>

@endsection