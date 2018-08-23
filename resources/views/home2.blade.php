@extends('layouts.layout')

@section('content')
<!--<div class="container-fluid row bg-dark" style="height:60px">
  <div class="col-3 d-flex justify-content-center">
    <p class="my-auto text-light">PROXIMOS JUEGOS</p>
  </div>
  <div class="col-9">
  </div>
</div>

<div class="container-fluid p-0" style="height:500px">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="width:100%; height:100%">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" style="max-height:500px" src="/assets/img/home/post1.jpg">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" style="max-height:500px" src="/assets/img/home/post2.jpg">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" style="max-height:500px" src="/assets/img/home/post3.jpg">
          </div>
        </div>
      </div>
</div>
-->


<div class="container text-center my-3 pb-3" style="background-color:black">

  <!--<div class="container col-12 m-0" style="height:100px; background-color:black" >
     PUBLICIDAD DE GOOGLE 
  </div>-->





  <div class="row">
  <div class="col-12 order-2 col-lg-4 order-lg-1">

        <!-- SPONSORS -->
        <section class="container contenedor pb-2 mb-2 rounded">
            <hr>
            <h3>SPONSORS</h3>
            <hr>
            <div class="row">
              <div class="col-6">
                  <a href="https://www.facebook.com/memazosvergasmusic/" target="_blank"><img src="/assets/img/logos/sponsor1.png" class="img-fluid" style="max-width:90%; height:80px;"></a>
              </div>
              <div class="col-6">
                  <a href="https://www.facebook.com/LAIRREVERENTENEWYORK/" target="_blank"><img src="/assets/img/logos/sponsor2.png" class="img-fluid" style="max-width: 90%;  height:80px;"></a>
              </div>
            </div>
        </section>

        <!-- STANDINGS -->
        <section class="container contenedor pb-2 mb-2 rounded">
          <hr>
          <h3>STANDINGS</h3>
          <hr>
          
            <table class="table table-striped table-dark table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">@lang('standings.pos')</th>
                    <th scope="col">@lang('standings.team')</th>
                    <th scope="col">@lang('standings.GP')</th>
                    <th scope="col">@lang('standings.GD')</th>
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

                    <td>{{$cont}}°</td>
                    <td class="text-left" style="font-weight:bold"><i class="fas fa-circle" style="color: {{$team->primary_color}}"></i>
                          <span>&#160&#160{{$team->abbreviation}}</span></td>

                    <td style="font-weight: bold">{{$stand->games_played}}</td>
                        @if($stand->goal_difference > 0) <td style="font-weight:normal">+{{$stand->goal_difference}}</td>
                        @elseif($stand->goal_difference < 0) <td style="font-weight:normal">{{$stand->goal_difference}}</td>
                        @else <td style="font-weight:normal">0</td>
                        @endif
                    <td class="font-weight-bold">{{$stand->points}}</td>
                  </tr>
                      @else
                      @continue
                      @endif
                      @endforeach
                  @endforeach
                  
                </tbody>
              </table>
      </section>

      <!-- REDES SOCIALES -->
      <section class="container contenedor pb-2 mb-2 rounded">
          <hr>
          <h3>REDES SOCIALES</h3>
          <hr>
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpuntogmr%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
      </section>


  </div>







  <div class="col-12 order-1 col-lg-8  order-lg-2">

      <div class="row">
        <div class="col-12 col-md-6">
            <br>
          <h3 class="w-100 text-center">Transferibles</h3>
          <hr>
            <table class="table table-striped table-dark table-hover table-sm">
                <thead class="thead-dark">
                  <th>Equipo</th>
                  <th>Jugador </th>
                  <th>Posicion </th>
                </thead>
                <tbody>
                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>ReyZack10</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.RM')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>rene_punisher</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.CDM')</span></td>
                  </tr>

                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>Xx_10-Shadows_xX</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.LB')</span></td>
                  </tr>

                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>youngrod-973</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.CB')</span></td>
                  </tr>

                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>hgx45</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.CDM')</span></td>
                  </tr>

                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>Felix23Melchor</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.RM')</span></td>
                  </tr>

                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>about23hispanic</td>
                    <td><span class="badge" style="background-color:#4b89dc; color:black; font-weight:bold">@lang('position.ST')</span></td>
                  </tr>

                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>Arellano_007</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.CB')</span></td>
                  </tr>

                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>GOLDEN LIONS</td>
                    <td>margbc29</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.CDM')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Agt_Morenazo</td>
                    <td><span class="badge" style="background-color:#e9573e; color:black; font-weight:bold">@lang('position.GK')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Andresfelipe009</td>
                    <td><span class="badge" style="background-color:#e9573e; color:black; font-weight:bold">@lang('position.GK')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>elwinner90</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.CB')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Fc-RoNaldiNhoG10</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.LB')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Fifa100preal10</td>
                    <td><span class="badge" style="background-color:#4b89dc; color:black; font-weight:bold">@lang('position.ST')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Finger-Wars</td>
                    <td><span class="badge" style="background-color:#4b89dc; color:black; font-weight:bold">@lang('position.LW')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>jonychiva</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.RM')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>JOzil95</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.CB')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Kingding1x</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.RB')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Kioyugui13</td>
                    <td><span class="badge" style="background-color:#4b89dc; color:black; font-weight:bold">@lang('position.ST')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Leandropinto1990</td>
                    <td><span class="badge" style="background-color:#4b89dc; color:black; font-weight:bold">@lang('position.ST')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>LOKOPORATLAS</td>
                    <td><span class="badge" style="background-color:#e9573e; color:black; font-weight:bold">@lang('position.GK')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Midnightknight1</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.CB')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Mundog0604</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.RM')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>Precixionzz4__</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.CB')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>SrCriminal</td>
                    <td><span class="badge" style="background-color:#4b89dc; color:black; font-weight:bold">@lang('position.ST')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>tobalALG</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.CAM')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>WillyABC2</td>
                    <td><span class="badge" style="background-color:#e9573e; color:black; font-weight:bold">@lang('position.GK')</span></td>
                  </tr>

                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>IRREVERENTE NY</td>
                    <td>X-OmG-iTz-Oli-X</td>
                    <td><span class="badge" style="background-color:#f6bb43; color:black; font-weight:bold">@lang('position.LB')</span></td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="col-12 col-md-6">
            <br>
          <h3 class="w-100 text-center">Ultimos Movimientos</h3>
          <hr>
            <table class="table table-striped table-dark table-hover table-sm">
                <thead class="thead-dark">
                  <th>Anterior</th>
                  <th>Jugador </th>
                  <th>Posicion </th>
                  <th>Actual</th>
                </thead>
                <tbody>
                    <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                      <td>GOLDEN EAGLES</td>
                      <td>Spirex1678</td>
                      <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.CDM')</span></td>
                      <td>RED HUSKYS FC</td>
                    </tr>
                  <tr class="clickable-row" data-href="/teams/uno" style="cursor:pointer">
                    <td>DRACOS FC</td>
                    <td>Dann1112</td>
                    <td><span class="badge" style="background-color:#8dc153; color:black; font-weight:bold">@lang('position.CDM')</span></td>
                    <td>RED HUSKYS FC</td>
                  </tr>
                </tbody>
              </table>
        </div>

      </div>
      
      <hr>

      <hr><hr>
        <h1 style="word-break: break-all">.GMR e-SPORTS<h1>
        <h2 class="my-2">Tu momento es ahora</h2>
        <hr>
        <hr>
        <h3 style="color:gold">ULTIMAS ACTUALIZACIONES</h3>
        <h4>Agosto 2018</h4>
        <p style="color:white">
          - Se puede visualizar el perfil de cada equipo donde se presenta su plantilla<br>
          - Los jugadores pueden ser suspendidos por acumulación de tarjetas amarillas o tarjetas rojas directas
        </p>
        <h4>Julio 2018</h4>
        <p style="color:white">
          - Los jugadores pueden ver un ranking detallato de su participación en el torneo jornada tras jornada<br>
          - Los jugadores pueden ver los rankings correspondientes a las estadísticas acumuladas de sus equipos
        </p>
      

        <hr>
  </div>
</div>



        
      </div>
@endsection
