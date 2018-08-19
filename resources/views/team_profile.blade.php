@extends('layouts.layout')

@section('content')

<div class="container-fluid" style="background: linear-gradient(to bottom, {{$team->primary_color}}, black);">
    <div class="container py-5 d-flex align-items-center justify-content-center">
        <div class="text-center">
        <h1 style="font-size:8vw">{{$team->name}}</h1>
            <ul class="inline-list mx-auto p-0" style="font-size:4em">
                @if($team->facebook !== null)
                    <li class="list-inline-item"><a href="#" target="_blank" style="color:white"> <i class="fab fa-facebook-f" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i></a></li>
                    @endif
                @if($team->twitter !== null)
                    <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-twitter" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                    @endif
                @if($team->youtube !== null)
                    <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-youtube" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                    @endif
                @if($team->twitch !== null)
                    <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-twitch" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                    @endif
                @if($team->instagram !== null)
                    <li class="list-inline-item"><a href="#" target="_blank" style="color:white"><i class="fab fa-instagram" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                    @endif
            </ul>
        </div>
    </div>
</div>




<div class="container-fluid" style="background-color:black">
    <div class="container">
        <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="general" aria-selected="true">@lang('teams.overview')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="squad-tab" data-toggle="tab" href="#squad" role="tab" aria-controls="general" aria-selected="true">@lang('teams.squad')</a>
            </li>
        </ul>
            

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="general-tab">
                <div class="container my-3">

                    <section class="mb-3">

                    <!-- ******************************************** 
                    MATCHES
                    ******************************************** -->
                        <hr class="border" style="color:white">
                        <h3 class="text-center" style="width:100%">@lang('teams.fixtures')</h3>
                        <hr class="border" style="color:white">
                                    
                        <div class="row justify-content-around my-3">
                            
                        <!-- ******************************************** 
                        LAST FIXTURE
                        ******************************************** -->
                            <div class="col-12 col-md-6 col-lg-3 md-my-0 my-2 d-flex flex-column align-items-center justify-content-center border rounded py-3">
                                <h4>@lang('teams.last_fixture')</h4>        
                                <div class="mb-3 row p-0 m-0" style="width:100%">

                                @if($last_fixture)
                                    <div class="text-center d-flex-column col-3">
                                        <i class="fas fa-circle fa-2x" style="color:{{$last_home_team->primary_color}}"></i>
                                        <p class="text-light">{{$last_home_team->abbreviation}}</p>
                                    </div>

                                    <div class="text-center col-6 p-0">
                                        <span style="font-size: 2em; color:white">{{$last_fixture->home_goals}} : {{$last_fixture->away_goals}}</span><br>
                                        <span class="text-light">{{$last_fixture->date}}</span>
                                        <span class="text-light">{{$last_fixture->time}}</span>
                                    </div>
                
                                    <div class="text-center d-flex-column col-3">
                                        <i class="fas fa-circle fa-2x" style="color:{{$last_away_team->primary_color}}"></i>
                                        <p class="text-light">{{$last_away_team->abbreviation}}</p>
                                    </div>

                                @else
                                    <div class="text-center col-12">
                                        <p class="text-light">N/A</p>
                                    </div>
                                @endif
                                </div>

                            </div>


                            
                        <!-- ******************************************** 
                        NEXT FIXTURE
                        ******************************************** -->
                            <div class="col-12 col-md-6 col-lg-3 md-my-0 my-2 d-flex flex-column align-items-center justify-content-center border rounded py-3">
                                <h4>@lang('teams.next_fixture')</h4>        
                                <div class="mb-3 row p-0 m-0" style="width:100%">

                                    @if($next_fixture)
                                    <div class="text-center d-flex-column col-3">
                                        <i class="fas fa-circle fa-2x" style="color:{{$next_home_team->primary_color}}"></i>
                                        <p class="text-light">{{$next_home_team->abbreviation}}</p>
                                    </div>

                                    <div class="text-center col-6 p-0">
                                        <span style="font-size: 2em; color:white"> vs </span><br>
                                        <span class="text-light">{{$next_fixture->date}}</span>
                                        <span class="text-light">{{$next_fixture->time}}</span>
                                    </div>
                    
                                    <div class="text-center d-flex-column col-3">
                                        <i class="fas fa-circle fa-2x" style="color:{{$next_away_team->primary_color}}"></i>
                                        <p class="text-light">{{$next_away_team->abbreviation}}</p>
                                    </div>

                                    @else
                                    <div class="text-center col-12">
                                        <p class="text-light">N/A</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            


                        <!-- ******************************************** 
                        FORM
                        ******************************************** -->

                            <div class="col-12 col-md-6 col-lg-4 md-my-0 my-2 d-flex flex-column align-items-center justify-content-center border rounded py-3">
                                <h4>@lang('teams.form')</h4>        
                                
                                <div class="d-flex justify-content-center" style="width:100%">
                                    <ul class="list-inline m-0" style="witdh:100%">
                                        @foreach($last_5_matches as $match)
                                            <li class="list-inline-item">
                                                <div class="d-flex flex-column text-center">

                                                    <!-- FIRST WE GOT TO KNOW IF CURRENT TEAM WAS HOME OR AWAY -->
                                                    <!-- ONCE WE KNOW THAT, WE LOOK FOR HIS OPPONENT -->
                                                    <!-- THEN WE SET THE SCORE AND THE COLOR OF THE CIRCLE -->
                                                    <!-- AT THE END WE SET HIS OPPONENT NAME -->
                                                    @if($match->home_team == $team->id)
                                                                    
                                                        @foreach($last_5_teams as $opponent)
                                                            @if($match->away_team == $opponent->id)
                                                                @if($match->home_goals > $match->away_goals)
                                                                    <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: lawngreen; height:40px; width:40px">
                                                                @elseif($match->home_goals < $match->away_goals)
                                                                    <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: red; height:40px; width:40px">
                                                                @else
                                                                    <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: yellow; height:40px; width:40px">
                                                                @endif

                                                                <span style="color:black; font-weight: bold">{{$match->home_goals}}:{{$match->away_goals}}</span>
                                                                </div>
                                                                    <p class="text-light">vs</p>
                                                                    <p class="text-light">{{$opponent->abbreviation}}</p>
                                                                @break
                                                            @else
                                                                @continue
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        @foreach($last_5_teams as $opponent)
                                                            @if($match->home_team == $opponent->id)

                                                                @if($match->home_goals > $match->away_goals)
                                                                    <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: red; height:40px; width:40px">
                                                                @elseif($match->home_goals < $match->away_goals)
                                                                    <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: lawngreen; height:40px; width:40px">
                                                                @else
                                                                    <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: yellow; height:40px; width:40px">
                                                                @endif

                                                                <span style="color:black; font-weight: bold">{{$match->home_goals}}:{{$match->away_goals}}</span>
                                                                </div>
                                                                    <p class="text-light">vs</p>
                                                                    <p class="text-light">{{$opponent->abbreviation}}</p>
                                                                @break
                                                            @else
                                                                @continue
                                                            @endif
                                                        @endforeach

                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>



                        <!-- ******************************************** 
                        CLUB MINI RANKING
                        ******************************************** -->    

                        <section class="mb-3">
                                <hr class="border" style="color:white">
                                <h3 class="text-center" style="width:100%">@lang('teams.club_ranking')</h3>
                            <hr class="border" style="color:white">
                            <div class="row d-flex justify-content-around">
                                    
                                    <div class="col-12 col-md-6 col-lg-3 md-my-0 my-2 card text-center border rounded contenedor">
                                            <h4 class="mt-2" style="color:white">@lang('teams.top_scorer')</h4>
                                            @if($assists_stats != null)
                                            <img class="card-img-top align-self-center rounded-circle" src="/assets/img/generic.png" style="height:auto; width:auto; max-height:150px; max-width:150px" alt="Card image cap">
                                            <div class="card-body">
                                                
                                                <p class="card-text" style="color:white; font-size:120%; font-weight:bold">{{$scorer_stats->player}}<br>{{$scorer_stats->goals}} @lang('teams.goals')</p>
                                                @else
                                                <div class="card-body">
                                                <p class="card-text" style="color:white; font-size:120%; font-weight:bold">{{$team->manager}}<br>- @lang('teams.goals')</p>
                                                @endif
                                            </div>
                                          </div>

                                          <div class="col-12 col-md-6 col-lg-3 md-my-0 my-2 card text-center border rounded contenedor">
                                            <h4 class="mt-2" style="color:white">@lang('teams.top_assists')</h4>
                                            @if($assists_stats != null)
                                            <img class="card-img-top align-self-center rounded-circle" src="/assets/img/generic.png" style="height:auto; width:auto; max-height:150px; max-width:150px" alt="Card image cap">
                                            <div class="card-body">
                                                
                                                <p class="card-text" style="color:white; font-size:120%; font-weight:bold">{{$assists_stats->player}}<br>{{$assists_stats->assists}} @lang('teams.assists')</p>
                                                @else
                                                <div class="card-body">
                                                <p class="card-text" style="color:white; font-size:120%; font-weight:bold">{{$team->manager}}<br>- @lang('teams.assists')</p>
                                                @endif  
                                            </div>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-3 md-my-0 my-2 card text-center border rounded contenedor">
                                                    <h4 class="mt-2" style="color:white">@lang('teams.the_best')</h4>
                                                    <div class="card-body">
                                                        
                                                            <p class="card-text" style="color:white; font-size:120%; font-weight:bold">@lang('teams.coming_soon')</p>
                                                    </div>
                                                  </div>
                            </div>
                        </section>
                    </div>


            <!-- ******************************************** 
            SQUAD TAB
            ******************************************** -->

            <div class="tab-pane fade" id="squad" role="tabpanel" aria-labelledby="squad-tab">
                <div class="container my-3">
                    <table class="table table-dark table-striped table-hover">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th class="d-none d-md-table-cell" scope="col">@lang('players.nationality')</th><!-- NACIONALIDAD -->
                                <th scope="col">@lang('players.name')</th> <!--NOMBRE-->
                                <th scope="col">@lang('players.position')</th> <!--POSICION-->
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($squad as $player)
                                <a href="/players/{{$player->username}}">
                                    @if($player->username == $team->manager)
                                        <tr class="text-center clickable-row bg-warning" data-href='players/{{$player->username}}' style="cursor:pointer">
                                    @elseif($player->username == $team->comanager)
                                        <tr class="text-center clickable-row bg-info" data-href='players/{{$player->username}}' style="cursor:pointer">
                                    @else
                                        <tr class="text-center clickable-row" data-href='players/{{$player->username}}' style="cursor:pointer">
                                    @endif

                                    <td class="d-none d-md-table-cell" ><img src="/assets/img/flags/{{$player->nationality.'@'}}3x.png" alt="{{$player->nationality}}" style="max-height: 30px; max-width: 30px"></td>
                                    <td>{{$player->username}}</td>
                                    <td>@include('partials.positions')</td>
                                    </tr>
                                </a>
                            @endforeach
                                        
                                    <script>
                                          jQuery(document).ready(function($) {
                                            $(".clickable-row").click(function() {
                                                window.location = $(this).data("href");
                                            });
                                        });
                                    </script>
                                    
                    
                                  
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection