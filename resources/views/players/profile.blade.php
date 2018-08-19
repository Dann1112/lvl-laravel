  @extends('layouts.layout')

  @section('content')

  
  
  <div class="container rounded py-3 my-3 contenedor">


    <hr>

    <div class="row">

        <div class="col-12 col-md-8">
            <div class="p-3 d-flex-column justify-content-center text-center" style="width:100%">
                <h1 style="font-size:7vw; color:white">{{$player->username}}</h1>
                <img class="rounded my-auto" src="/assets/img/flags/{{$player->nationality.'@'}}3x.png" alt="{{$player->nationality}}" style="height:50px; width:100px">
            </div>
            <div class="row d-flex justify-content-center">
                <!--<span class="badge p-2" style="background-color:gray;font-weight:bold"><h2 class="display-4 my-auto mx-3" style="color:white"></h2>-->
                </span>
            </div>
            <!--<div class="row p-3 d-flex justify-content-center">
            <ul class="inline-list mx-auto p-0" style="font-size:5em">
                <li class="list-inline-item"><a href="#" target="_blank" style="color:white"> <i class="fab fa-facebook-f" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-twitter" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-youtube" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-twitch" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-instagram" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
            </ul>
            </div>-->
          </div>
    
    <div class="col-12 col-md-4 d-flex justify-content-center">

        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-body contenedor">
                <ul class="list-group list-group-flush text-dark contenedor">

                  <li class="list-group-item text-center">
                    @if($team)
                      <i class="fas fa-circle" style="color: {{$team->primary_color}}"></i> <span class="font-weight-bold">{{$team->name}}</span>
                    @else
                      SIN EQUIPO
                    @endif
                </li>

                  <li class="list-group-item d-flex justify-content-between px-0">
                    <div class="col-7 text-left">
                        @lang('profile.age'):
                    </div>
                    <div class="col-5 text-right">
                        <span class="font-weight-bold">{{$age}} </span>
                    </div>
                   </li>


                   <li class="list-group-item d-flex justify-content-between px-0">
                      <div class="col-7 text-left">
                          @lang('profile.positions'):
                      </div>
                      <div class="col-5 text-right">
                          <span class="font-weight-bold">{{$player->position}}</span>
                      </div>
                     </li>


                     <li class="list-group-item d-flex justify-content-between px-0">
                        <div class="col-7 text-left">
                            @lang('profile.ranking_position'):
                        </div>
                        <div class="col-5 text-right">
                            <span class="font-weight-bold"> N/A</span>
                        </div>
                       </li>


                       <li class="list-group-item d-flex justify-content-between px-0">
                          <div class="col-7 text-left">
                              @lang('profile.member_since'):
                          </div>
                          <div class="col-5 text-right">
                              <span class="font-weight-bold">{{$member_since}} </span>
                          </div>
                         </li>
                  
                </ul>
            </div>
          </div>


    </div>


    
  </div>

      <hr>

    <h1 class="text-center" style="color:white">@lang('profile.history')</h1>
    <table class="table table-dark table-striped mx-auto table-responsive" style="width:90%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">@lang('profile.competition')</th>
          <th scope="col" class="d-none d-md-table-cell">@lang('profile.year')</th>
          <th scope="col">@lang('profile.team')</th>
          <th scope="col" class="text-center">@lang('profile.apps')</th>
          @switch($player->position)
          @case('GK')
            <th scope="col" class="text-center">@lang('profile.goals_conceded')</th>
            <th scope="col" class="text-center">@lang('profile.saves')</th>
            <th scope="col" class="text-center">@lang('profile.goals_per_match')</th>
            @break
          @case('CB')
          @case('LB')
          @case('RB')
          @case('CDM')
            <th scope="col" class="text-center">@lang('profile.possession_won')</th>
            <th scope="col" class="text-center">@lang('profile.effect') (@lang('profile.possession_won'))</th>
            <th scope="col" class="text-center">@lang('profile.tackles_won')</th>
            <th scope="col" class="text-center">@lang('profile.effect') (@lang('profile.tackles_won'))</th>
            @break
          @case('CAM')
          @case('CM')
          @case('LM')
          @case('RM')
            <th scope="col" class="text-center">@lang('profile.assists')</th>
            <th scope="col" class="text-center">@lang('profile.completed_passes')</th>
            <th scope="col" class="text-center">@lang('profile.effect') (@lang('profile.completed_passes'))</th>
            @break
          @case('LW')
          @case('RW')
          @case('ST')
            <th scope="col" class="text-center">@lang('profile.goals')</th>
            <th scope="col" class="text-center">@lang('profile.shots_on_target')</th>
            <th scope="col" class="text-center">@lang('profile.effect') (@lang('profile.shots_on_target'))</th>
            @break
          @endswitch

        </tr>
      </thead>
      <tbody>
        @foreach($stats as $stat)
          <tr>
              <td>{{$stat->COMPETITION}}</td>
              <td class="d-none d-md-table-cell">{{$stat->YEAR}}</td>
              <td>{{$stat->TEAM}}</td>
              <td class="text-center">{{$stat->APPS}}</td>
              @switch($player->position)
              @case('GK')
                <td class="text-center">{{$stat->GOALS_CONCEDED}}</td>
                <td class="text-center">{{$stat->SAVES}}</td>
                <td class="text-center">{{$stat->GOALS_CONCEDED / $stat->APPS}}</td>
                @break
              @case('CB')
              @case('LB')
              @case('RB')
              @case('CDM')
                <td class="text-center">{{$stat->WON_POSSESSION}}</td>
                <td class="text-center">{{($stat->WON_POSSESSION * 100) / ($stat->WON_POSSESSION + $stat->LOST_POSSESSION)}} %</td>
                <td class="text-center">{{$stat->WON_TACKLES}}</td>
                <td class="text-center">{{($stat->WON_TACKLES * 100) / ($stat->WON_TACKLES + $stat->LOST_TACKLES)}} %</td>
                @break
              @case('CAM')
              @case('CM')
              @case('LM')
              @case('RM')
                <td class="text-center">{{$stat->ASSISTS}}</td>
                <td class="text-center">{{$stat->COMPLETED_PASSES}}</td>
                <td class="text-center">{{($stat->COMPLETED_PASSES * 100) / ($stat->COMPLETED_PASSES + $stat->FAILED_PASSES)}} %</td>
                @break
              @case('LW')
              @case('RW')
              @case('ST')
                <td class="text-center">{{$stat->GOALS}}</td>
                <td class="text-center">{{$stat->SHOTS_ON_TARGET}}</td>
                <td class="text-center">{{($stat->SHOTS_ON_TARGET * 100) / ($stat->SHOTS_ON_TARGET + $stat->SHOTS_AWAY)}} %</td>
                @break
              @endswitch
              @endforeach
    
            </tr>

      </tbody>
    </table>

    <hr>
  </div>

  @endsection