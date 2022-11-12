<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ICEY') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

</head>
<body>
   
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset ('/img/icey.png') }}" alt="" width="50" height="29" class="d-inline-block align-text-top">
                    ICEY
                  </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
            
                                <main>
                            @else
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link active">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" navbarDropdown" 
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Archivos</a>
                                <ul class="dropdown-menu">
                                        <a href="{{route('facilitadors')}}" class="dropdown-item">Facilitadores</a>
                                    </li>
                                    <li>
                                        <a href="{{route('cursantes')}}" class="dropdown-item">Cursantes</a>
                                    </li>
                                     <li><!--crear submenu -->
                                        <a href="{{route('estados')}}" class="dropdown-item">Estados</a>
                                    </li>
                                    </li>
                                                    <li>
                                        <a href="{{route('municipios')}}" class="dropdown-item">Municipio</a>
                                    </li>
                                </li>
                                       <li>
                                          <a href="{{route('parroquias')}}" class="dropdown-item">Parroquias</a>
                                     </li>
                                    <li>
                                        <a href="{{route('espacios')}}" class="dropdown-item">Espacio</a>
                                    </li>
                                    <li>
                                      <a href="{{route('cursos')}}" class="dropdown-item">Cursos</a>
                                  </li>
                                        </ul>
                                        

                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" navbarDropdown" 
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Procesos</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('solicitude')}}" class="dropdown-item">Solicitud Facilitador</a>
                                    </li>
                                    <li>
                                      <a href="{{route('solicitudes_cursante')}}" class="dropdown-item">Solicitud Cursante</a>
                                  </li>
                         </ul>

                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Reportes</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Manual</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Session') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>


                            </li>
                        @endguest
                    </main>
                    </ul>
                </div>
            </div>
        </nav>
    
        <main class="py-4">
            @yield('content')
        </main>

    </div>
        <footer>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
    
                <div class="col-md-3">
                  <div class="footer-site-info">2020 © <a href="https://www.youtube.com/watch?v=pdr4IzBpacI&t=34s" target="_blank">Top HTML & CSS Program </a></div>
                </div>
    
                <div class="col-md-6">
                  <nav id="footer-navigation" class="site-navigation footer-navigation centered-box" role="navigation">
                    <ul id="footer-menu" class="nav-menu styled clearfix inline-inside">
                      <li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26"><a href="#">Support</a></li>
                      <li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a href="#">Contact Us</a></li>
                      <li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28"><a href="#">Disclaimer</a></li>
                      <li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29"><a href="#">Add more</a></li>
                    </ul>
                  </nav>
                </div>
    
                <div class="col-md-3">
                  <div id="footer-socials">
                    <div class="socials inline-inside socials-colored">
    
                      <a href="#" target="_blank" title="Facebook" class="socials-item">
                        <i class="fab fa-facebook-f facebook"></i>
                      </a>
                      <a href="#" target="_blank" title="Twitter" class="socials-item">
                        <i class="fab fa-twitter twitter"></i>
    
                      </a>
                      <a href="#" target="_blank" title="Instagram" class="socials-item">
                        <i class="fab fa-instagram instagram"></i>
                      </a>
                      <a href="#" target="_blank" title="YouTube" class="socials-item">
                        <i class="fab fa-youtube youtube"></i>
                      </a>
                      <a href="#" target="_blank" title="Telegram" class="socials-item">
                        <i class="fab fa-telegram telegram"></i>
                      </a>
                    </div>
                  </div>
                </div>
    
              </div>
            </div>
          </div>
        </footer>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>
    
     <script> jQuery('#waterdrop').raindrops({color:'#1c1f2f', canvasHeight:150, density: 0.1, frequency: 20});
    </script>

   

</body>
</html>
