@extends('layouts.layout')

@section('content')

<!-- Filter Options-->
<div class="container-fluid py-3 col-sm-10 col-12 mx-auto my-3 contenedor">

        <!-- Table -->
        <div class="container-fluid">

           <table class="table table-striped table-dark table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Pos</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">PJ</th>
                    <th scope="col" class="d-none d-sm-table-cell">PG</th>
                    <th scope="col" class="d-none d-sm-table-cell">PE</th>
                    <th scope="col" class="d-none d-sm-table-cell">PP</th>
                    <th scope="col">DG</th>
                    <th scope="col" class="d-none d-sm-table-cell">GF</th>
                    <th scope="col" class="d-none d-sm-table-cell">GC</th>
                    <th scope="col">Pts</th>
                  </tr>
                </thead>
                <tbody>
                  @php $cont = 0;@endphp
                  @foreach($standings as $stand)
                  @php $cont++; @endphp

                  @foreach($teams as $team)
                  @if($stand->team == $team->id)
                  @if($cont==1)
                  <tr style="background-color:lawngreen; color:black">
                    @else
                    <tr>
                      @endif
                        <!--<th scope="row">{{$stand->position}}&nbsp<i class="fa fa-caret-up"></i></th>-->
                        <td>{{$cont}}</td>
                    <!-- <td><img src="/storage/{{$team->logo}}" style="max-height: 20px; max-width: 20px"> -->
                    <td><i class="fas fa-circle" style="color: {{$team->primary_color}}"></i>
                        <span class="d-none d-sm-inline">&#160&#160{{$team->name}}</span>
                          <span class="d-inline d-sm-none">{{$team->abbreviation}}</span></td>
                        <td style="font-weight: bold">{{$stand->games_played}}</td>
                        <th scope="col" class="d-none d-sm-table-cell">{{$stand->games_won}}</th>
                        <th scope="col" class="d-none d-sm-table-cell">{{$stand->games_tied}}</th>
                        <th scope="col" class="d-none d-sm-table-cell">{{$stand->games_won}}</th>
                        <td>{{$stand->goal_difference}}</td>
                        <th scope="col" class="d-none d-sm-table-cell">{{$stand->goals_for}}</th>
                        <th scope="col" class="d-none d-sm-table-cell">{{$stand->goals_against}}</th>
                        <td>{{$stand->points}}</td>
                      </tr>
                      @else
                      @continue
                      @endif
                      @endforeach
                  @endforeach
                  
                </tbody>
              </table>
          
        </div>
    
        <p class="text-center" style="width: 100%; color: white">
        POS: Muestra la ubicación general del equipo en la tabla y su movimiento respecto a la jornada anterior<br>
        PJ: Partidos Jugados<br>
        PG: Partidos Ganados<br>
        PE: Partidos Empatados<br>
        PP: Partidos Perdidos<br>
        DG: Diferencia de Goles<br>
        GF: Goles a Favor<br>
        GC: Goles en Contra<br>
        Pts: Puntos acumulados hasta este momento
        </p>
    
      </div>

@endsection