<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	 @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Gestión del sistema
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ url('/gradgrups') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Grado y grupo</a> 
                                    <a href="{{ url('/sexos') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Sexos</a>
                                    <a href="{{ url('/especialidades') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Especialidades</a>
                                    <a href="{{ url('/turnos') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Turnos</a> 
                                    <a href="{{ url('/numcontrols') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Numeros de control</a> 
                                    <a href="{{ url('/classmodels') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Tipos de Notificaciones (CSS)</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Gestión de registros
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ url('/usuarios') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Usuarios</a> 
                                    
                                    <a href="{{ url('/maestros') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Maestros</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Gestión de datos
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ url('/publicaciones') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Publicaciones</a> 
                                    <a href="{{ url('/descargas') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Descargas</a> 
                                    <a href="{{ url('/anuncios') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Anuncios</a>
                                    <a href="{{ url('/notifications') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Notificaciones</a> 
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Arreglos
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ url('/argpublics') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Publicaciones(V2)</a>
                                    <a href="{{ url('/socials') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Social</a>
                                    <a href="{{ url('/argalumnos') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Alumnos panel</a>
                                    <a href="{{ url('/argmaestros') }}" class="dropdown-item"><i class="fab fa-laravel text-info"></i> Maestros Panel</a> 
                                </div>
                            </li>
						<!--Nav Bar Hooks - Do not delete!!-->
						<!--<li class="nav-item">
                            <a href="{{ url('/socials') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Socials</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/argpublics') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Argpublics</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/notifications') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Notifications</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/classmodels') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Classmodels</a> 
                        </li>

						<li class="nav-item">
                            <a href="{{ url('/gradgrups') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Gradgrups</a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/argalumnos') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Argalumnos</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/argmaestros') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Argmaestros</a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/argpublics') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Argpublics</a> 
                        </li>

						<li class="nav-item">
                            <a href="{{ url('/sexos') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Sexos</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/descargas') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Descargas</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/publicaciones') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Publicaciones</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/especialidades') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Especialidades</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/anuncios') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Anuncios</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/turnos') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Turnos</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/maestros') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Maestros</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/usuarios') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Usuarios</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/numcontrols') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Numcontrols</a> 
                        </li>-->
                    </ul>
					@endauth()
					
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>
    </div>
    @livewireScripts
<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
</body>
</html>
