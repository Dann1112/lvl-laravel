<header class="fixed-top container-fluid d-flex p-0">

	<div class="container-fluid row d-none d-md-flex">

		<div class="col-3 d-flex justify-content-center" style="height:100%">
				<img class="my-auto mx-auto" src="/assets/img/logos/logo2.png" style="max-width:70%; max-height:95%">

		</div>
		<div class="col-7 p-0 d-flex justify-content-around" style="height:100%">

				<ul class="nav nav-pills nav-fill my-auto" style="width:90%">
							<li class="nav-item">
								<a class="nav-link" href="{{route('home')}}">@lang('header.home')</a>
							</li>
							<li class="nav-item">
							<a class="nav-link " href="{{route('standings')}}">@lang('header.standings')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="{{route('players')}}">@lang('header.players')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="/ranking/goals">@lang('header.ranking')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="#">@lang('header.contact')</a>
							</li>
					  </ul>

			

		</div>

		<!-- Session Data (Login or User Info) -->
		@if(Auth::check())
		<div class="d-flex col-2 text-center">

			
				<div class="my-auto">
									<div class="d-flex">
										<div class="btn-group mx-auto">
										<a href="\players\{{auth()->user()->username}}" > <button type="button" class="btn btn-outline-light">
											<img class="rounded-circle" src="/assets/img/generic.png" style="max-height: 30px"></button></a>
												<button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu">
													<!-- <a class="dropdown-item" href="{{route('edit_profile')}}"><i class="fas fa-user mr-2"></i>Mi Perfil</a>
													<a class="dropdown-item" href="{{route('inbox')}}"><i class="fas fa-envelope mr-2"></i>Mis Mensajes</a>
													<a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i>Mis Contratos</a> -->
													<a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Mi Perfil</a>
													<a class="dropdown-item" href="#"><i class="fas fa-envelope mr-2"></i>Mis Mensajes</a>
													<a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i>Mis Contratos</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item bg-danger" href="{{route('logout')}}" style="color:white"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión</a>
												</div>
										</div>
									</div>
									<span style="color:white; font-weight: bold">{{Auth::user()->username}}</span><br>
								</div>
							</div>

		@else
		<div class="col-2 p-0 d-none d-md-flex flex-column align-items-center justify-content-around">
				<a href="{{route('login')}}" class="btn acento" style="width:80%; font-weight:bold; color:white"><i class="fas fa-sign-in-alt mr-2"></i>@lang('header.signin')</a>
		</div>
		@endif

	</div>

	<div class="container-fluid row d-md-none p-0">

			<div class="col-12 d-flex justify-content-center" style="height:100%">
					<img class="my-auto mx-auto" src="/assets/img/logos/logo2.png" style="max-width:70%; max-height:95%">
			</div>

			
	
			
	
		</div>

</header>