<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head')
    @include('partials.header')
    <body>
        <!-- Div que permite desplazar el contenido debido al header flotante-->
        <div class="container-fluid row" style="height:70px; background-color: black">
        </div>
        <div class="col-12 d-md-none p-0">

				<ul class="nav flex-column text-center" style="background-color: black">

			<!-- Session Data (Login or User Info) -->
			@if(Auth::check())
				<li class="nav-item border-bottom" style="background-color: goldenrod; color:red">
					<a class="nav-link" href="#"><img class="rounded-circle" src="/assets/img/generic.png" style="max-height: 90%">{{auth()->user()->username}}</a>
				</li>
			@endif

					<li class="nav-item border-bottom" >
						<a class="nav-link" href="{{route('home')}}" style="color:white; text-decoration:none; font-weight: bold">@lang('header.home')</a>
					</li>
					<li class="nav-item border-bottom">
						<a class="nav-link" href="{{route('standings')}}" style="color:white; text-decoration:none; font-weight: bold">@lang('header.standings')</a>
					</li>
					<li class="nav-item border-bottom">
						<a class="nav-link" href="{{route('players')}}" style="color:white; text-decoration:none; font-weight: bold">@lang('header.players')</a>
					</li>
					<li class="nav-item border-bottom">
						<a class="nav-link" href="#" style="color:white; text-decoration:none; font-weight: bold">@lang('header.ranking')</a>
					</li>
					<li class="nav-item border-bottom">
						<a class="nav-link" href="#" style="color:white; text-decoration:none; font-weight: bold">@lang('header.contact')</a>
					</li>
				</ul>

			</div>
        @yield('content')
    </body>
    @include('partials.footer')
</html>