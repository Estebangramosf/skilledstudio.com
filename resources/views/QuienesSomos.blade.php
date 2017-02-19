@extends('layouts.clean')
@section('title') Home @endsection
@section('content')
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="font-family: Coolvetica;">

  <!-- Navigation -->
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
          Menu <i class="fa fa-bars"></i>
        </button>

        <a class="navbar-brand" href="{{ url('/') }}">
          <span style="color: #c43d23;">
            <span style="font-family: Coolvetica;font-size: 1.9em; text-transform: capitalize;
              text-shadow: 2px 3px 15px rgb(255, 82, 44);"
                  class="brand-heading">{{ucfirst('Skilled')}}</span>
          </span>
          <span style="color: #d5822d;">
            <span style="font-family: Coolvetica;text-transform: capitalize;font-size: 1.9em;
              text-shadow: 2px 3px 15px rgb(255, 156, 53);"
                  class="brand-heading">{{ucfirst('Studio')}}</span>
          </span>
        </a>


        {{--
        <a class="navbar-brand page-scroll" href="#page-top">
          <i class="fa fa-play-circle"></i> <span class="light" style="font-family: Coolvetica;">SkilledStudio</span>
        </a>
        --}}

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse" style="font-family: Coolvetica;">
        <ul class="nav navbar-nav">
          <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
          <li class="hidden">
            <a href="#page-top"></a>
          </li>

          {{--
          <li>
            <a class="page-scroll" href="#about">Dembora</a>
          </li>
          <li>
            <a class="page-scroll" href="#news">Noticias</a>
          </li>
          <li>
            <a class="page-scroll" href="#develop">Desarrollo</a>
          </li>
          <li>
            <a class="page-scroll" href="#multimedia">Multimedia</a>
          </li>
          <li>
            <a class="page-scroll" href="#joincommunity">Comunidad</a>
          </li>
          --}}

          @if (Auth::guest())
            <li>
              <a class="page-scroll" href="{!! url('/login') !!}">Acceso</a>
            </li>
            <li>
              <a class="page-scroll" href="{!! url('/register') !!}">Registro</a>
            </li>
          @else
            <li><a href="{{ url('/posts') }}"><i class="fa fa-btn fa-sign-out"></i>Menú</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
          @endif



        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Intro Header -->
  <header class="quienes-somos">
    <div class="intro-body">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            {{--
                          <span style="font-family: Coolvetica;color:#c43d23;" class="brand-heading">Skilled</span>
                          <span style="font-family: Coolvetica;color:#d5822d;" class="brand-heading">Studio</span>
            --}}
            <img width="45%" style="padding-bottom: 10px;" src="{!! asset('img/backgrounds/Demborafinal.png') !!}" alt=""/>
            <br>
{{--
            <a href="#group-gallery" class="btn btn-circle page-scroll">
              <i class="fa fa-angle-double-down animated"></i>
            </a>
--}}
            <br>
            <br>
            <br>
            <br>
            <h2 style="text-shadow: 0 0 5px rgba(255, 255, 249, 0.68);">Qui&eacute;nes Somos</h2>
            <br>
            <br>
            <span style="
              font-size: 1.8em;
              text-shadow: 0 0 5px rgba(255, 255, 249, 0.68);
              ">
              SKILLED STUDIO <br> Somos una empresa independiente de desarrollo de videojuegos, ubicada en Santiago de Chile. Contamos con un equipo de más de 20 profesionales. Nuestra misión es otorgar un servicio de calidad para satisfacer las expectativas de los jugadores. Estamos comprometidos en realizar videojuegos únicos que destaquen en originalidad y contenido.
            </span>

          </div>
        </div>
      </div>
    </div>
  </header>



  {{--
    <!-- Multimedia Section -->
    <section id="multimedia" class="content-section text-center">
      <div class="download-section" style="background: url(../img/backgrounds/Fondos4.png) no-repeat center center scroll;">
        <div class="container">
          <div class="col-lg-8 col-lg-offset-2">
            <h2>Multimedia</h2>
            <p>You can download Grayscale for free on the preview page at Start Bootstrap.</p>
            <a href="#!" class="btn btn-default btn-lg">
              Mira nuestras galerías
            </a>
          </div>
        </div>
      </div>
    </section>
  --}}

  @include('layouts.workTeam')


  <!-- Map Section -->
  {{--<div id="map"></div>--}}

    <!-- Footer -->
  <footer>
    <div class="container text-center">
      <p style="text-shadow: 0 0 5px rgba(255, 255, 249, 0.68);">Copyright &copy; Dembora&SkilledStudio {{date('Y')}}</p>
    </div>
  </footer>




  </body>
@endsection

