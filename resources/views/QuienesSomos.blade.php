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
            <span style="font-family: Coolvetica;font-size: 1.9em; text-transform: capitalize;" class="brand-heading">{{ucfirst('Skilled')}}</span>
          </span>
          <span style="color: #d5822d;">
            <span style="font-family: Coolvetica;text-transform: capitalize;font-size: 1.9em;" class="brand-heading">{{ucfirst('Studio')}}</span>
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
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-btn fa-sign-out"></i>Menú</a></li>
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
            <img width="35%" style="padding-bottom: 10px;" src="{!! asset('img/backgrounds/Demborafinal.png') !!}" alt=""/>
            <br>
            <a href="#group-gallery" class="btn btn-circle page-scroll">
              <i class="fa fa-angle-double-down animated"></i>
            </a>

            <h2>Quienes Somos</h2>
            <span style="font-size: 1.6em;">
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


    <section id="group-gallery" class="container"  style="padding-top: 30px;">
      <div class="row">
        <div class="col-sm-1 col-md-1">
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2">
          <div class="thumbnail" style="background: transparent;background-color: transparent;border: transparent;">
            <a href="/w3images/lights.jpg">
              <img src="{{asset('equiposkst/1leandro.png')}}" class="img-circle" alt="Lights" width="304" height="236">
              <div align="middle" class="caption">
                <p>Leandro</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2">
          <div class="thumbnail" style="background: transparent;background-color: transparent;border: transparent;">
            <a href="/w3images/nature.jpg">
              <img src="{{asset('equiposkst/2maximiliano.png')}}" class="img-circle" alt="Nature" width="304" height="236">
              <div align="middle" class="caption">
                <p>Maximiliano</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2">
          <div class="thumbnail" style="background: transparent;background-color: transparent;border: transparent;">
            <a href="#!">
              <img src="{{asset('equiposkst/3colin.png')}}" class="img-circle" alt="Fjords" width="304" height="236">
              <div align="middle" class="caption">
                <p>Colin</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2">
          <div class="thumbnail" style="background: transparent;background-color: transparent;border: transparent;">
            <a href="#!">
              <img src="{{asset('equiposkst/4jason.png')}}" class="img-circle" alt="Fjords" width="304" height="236">
              <div align="middle" class="caption">
                <p>Jason</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2">
          <div class="thumbnail" style="background: transparent;background-color: transparent;border: transparent;  ">
            <a href="#!">
              <img src="{{asset('equiposkst/5ignacion.png')}}" class="img-circle" alt="Fjords" width="304" height="236">
              <div align="middle" class="caption">
                <p>Ignacio</p>
              </div>
            </a>
          </div>
        </div>
      </div>

    </section>


  <!-- Map Section -->
  {{--<div id="map"></div>--}}

    <!-- Footer -->
  <footer>
    <div class="container text-center">
      <p>Copyright &copy; Dembora&SkilledStudio {{date('Y')}}</p>
    </div>
  </footer>




  </body>
@endsection

