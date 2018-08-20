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
