<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head')
	@include('partials.header')
	<div id="fb-root"></div>

	<!-- SCRIPT FOR FACEBOOK DEVELOPERS PLUGIN -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <body>
        <!-- Div que permite desplazar el contenido debido al header flotante-->
        <div class="container-fluid row" style="height:70px; background-color: black">
        </div>
        <div class="col-12 d-md-none p-0">

				<ul class="nav flex-column text-center" style="background-color: black">

			<!-- Session Data (Login or User Info) -->
			@if(Auth::check())
				<li class="nav-item border-bottom" style="background-color: goldenrod; color:red">
					<a class="nav-link" href="#"><img class="rounded-circle" src="/assets/img/generic.png" style="max-height: 30px">{{auth()->user()->username}}</a>
                </li>
            @else
                <li class="nav-item border-bottom">
                    <a href="{{route('login')}}" class="btn acento" style="width:80%; font-weight:bold; color:white"><i class="fas fa-sign-in-alt mr-2"></i>@lang('header.signin')</a>
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
						<a class="nav-link" href="/ranking/goals" style="color:white; text-decoration:none; font-weight: bold">@lang('header.ranking')</a>
					</li>
					<li class="nav-item border-bottom">
						<a class="nav-link" href="{{route('contact')}}" style="color:white; text-decoration:none; font-weight: bold">@lang('header.contact')</a>
					</li>
				</ul>

			</div>
        @yield('content')
    </body>
    @include('partials.footer')
</html>