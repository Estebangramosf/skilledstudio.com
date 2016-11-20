



@extends('layouts.clean')

@section('content')
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="font-family: Coolvetica;">

  <!-- Navigation -->
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
          Menu <i class="fa fa-bars"></i>
        </button>
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
          <li>
            <a class="page-scroll" href="#about">Acerca de</a>
          </li>
          <li>
            <a class="page-scroll" href="#download">Equipo</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contacto</a>
          </li>
          <li>
            <a class="page-scroll" href="{!! url('/login') !!}">Acceso</a>
          </li>
          <li>
            <a class="page-scroll" href="{!! url('/register') !!}">Registro</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Intro Header -->
  <header class="intro">
    <div class="intro-body">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <u style="color: #c43d23;">
              <span style="font-family: Coolvetica;" class="brand-heading">Skilled</span>
              &nbsp;&nbsp;
            </u>

            <u style="color: #d5822d;">
              <span style="font-family: Coolvetica;" class="brand-heading">Studio</span>
            </u>

            <p class="intro-text">Dembora project. <br> Comming Soon.
              <br></p>
            <a href="#about" class="btn btn-circle page-scroll">
              <i class="fa fa-angle-double-down animated"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="container content-section text-center">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <h2>About Grayscale</h2>
        <p>Grayscale is a free Bootstrap 3 theme created by Start Bootstrap. It can be yours right now, simply download the template on <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
        <p>This theme features stock photos by <a href="http://gratisography.com/">Gratisography</a> along with a custom Google Maps skin courtesy of <a href="http://snazzymaps.com/">Snazzy Maps</a>.</p>
        <p>Grayscale includes full HTML, CSS, and custom JavaScript files along with LESS files for easy customization.</p>
      </div>
    </div>
  </section>

  <!-- Download Section -->
  <section id="download" class="content-section text-center">
    <div class="download-section">
      <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
          <h2>Download Grayscale</h2>
          <p>You can download Grayscale for free on the preview page at Start Bootstrap.</p>
          <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">Visit Download Page</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="container content-section text-center">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <h2>Contact Start Bootstrap</h2>
        <p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!</p>
        <p><a href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
        </p>
        <ul class="list-inline banner-social-buttons">
          <li>
            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
          </li>
          <li>
            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
          </li>
          <li>
            <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Map Section -->
  <div id="map"></div>

  <!-- Footer -->
  <footer>
    <div class="container text-center">
      <p>Copyright &copy; Your Website 2016</p>
    </div>
  </footer>

  <!-- jQuery -->


  <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>





  </body>
@endsection

