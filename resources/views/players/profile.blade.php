  @extends('layouts.layout')

  @section('content')

  
  
  <div class="container rounded py-3 my-3 contenedor">


    <hr>
      <span class="badge p-2 bg-warning mx-auto" style="font-weight:bold; width:100%"><h2 class="display-5 my-auto mx-3 text-dark" style="width:100%">PAGINA EN CONSTRUCCION. ENVIA TUS SUGERENCIAS</h2> </span>
    <hr>
    <hr>

    <div class="row">

        <div class="col-12 col-md-8">
            <div class="row p-3 d-flex justify-content-center">
                <h1 class="display-3 my-auto mx-3" style="color:white">{{$player->username}}</h1>
                <img class="rounded my-auto" src="/assets/img/flags/{{$player->nationality.'@'}}3x.png" alt="{{$player->nationality}}" style="height:50px; width:100px">
            </div>
            <div class="row d-flex justify-content-center">
                <!--<span class="badge p-2" style="background-color:gray;font-weight:bold"><h2 class="display-4 my-auto mx-3" style="color:white"></h2>-->
                </span>
            </div>
            <div class="row p-3 d-flex justify-content-center">
            <ul class="inline-list mx-auto p-0" style="font-size:5em">
                <li class="list-inline-item"><a href="http://www." target="_blank" style="color:white"> <i class="fab fa-facebook-f" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="http://www." target="_blank" style="color:white"><i class="fab fa-twitter" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="http://www." target="_blank" style="color:white"><i class="fab fa-youtube" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="http://www." target="_blank" style="color:white"><i class="fab fa-twitch" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
                <li class="list-inline-item"><a href="http://www." target="_blank" style="color:white"><i class="fab fa-instagram" data-fa-transform="shrink-3.5" data-fa-mask="fas fa-circle"></i></a></li>
            </ul>
            </div>
          </div>
    
    <div class="col-12 col-md-4 d-flex justify-content-center">

        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">@lang('profile.overview')</div>
            <div class="card-body">
                <ul class="list-group list-group-flush text-dark">
                  <li class="list-group-item">@lang('profile.positions'):<br>{{$player->position}}</li>
                  <li class="list-group-item">@lang('profile.age'):<br>{{$player->birth_date}}</li>
                  <li class="list-group-item">@lang('profile.ranking_position'):<br></li>
                  <li class="list-group-item">@lang('profile.awards'):<br></li>
                </ul>
            </div>
          </div>


    </div>


    
  </div>

      <hr>

    <h1 class="text-center" style="color:white">@lang('profile.statistics')</h1>
    <table class="table table-dark table-striped table-sm mx-auto" style="width:90%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">@lang('profile.apps')</th>
          <th scope="col">@lang('profile.goals')</th>
          <th scope="col">@lang('profile.assists')</th>
          <th scope="col">@lang('profile.yellow_cards')</th>
          <th scope="col">@lang('profile.red_cards')</th>



        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{\App\PlayerStat::where('player',$player->username)->count()}}</td>
          <td>{{\App\PlayerStat::where('player',$player->username)->sum('goals')}}</td>
          <td>{{\App\PlayerStat::where('player',$player->username)->sum('assists')}}</td>
          <td>{{\App\PlayerStat::where('player',$player->username)->sum('yellow_cards')}}</td>
          <td>{{\App\PlayerStat::where('player',$player->username)->sum('red_cards')}}</td>
        </tr>

      </tbody>
    </table>

    <hr>
    <section hidden>
    <h1 class="text-center" style="color:white">@lang('profile.history')</h1>
    <table class="table table-dark table-striped table-sm mx-auto" style="width:90%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">EQUIPO</th>
          <th scope="col">GOLES</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Azathoth</td>
          <td>0</td>
        </tr>
        <tr class="table-info font-weight-bold" style="color:black">
          <td>@lang('profile.totals')</td>
          <td>0</td>
        </tr>

      </tbody>
    </table>
    </section>

  </div>

  @endsection