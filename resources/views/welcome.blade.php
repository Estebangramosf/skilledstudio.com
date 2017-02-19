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
              /*text-shadow: 2px 3px 15px rgb(255, 82, 44);*/"
                  class="brand-heading">{{ucfirst('Skilled')}}</span>
          </span>
          <span style="color: #d5822d;">
            <span style="font-family: Coolvetica;text-transform: capitalize;font-size: 1.9em;
              /*text-shadow: 2px 3px 15px rgb(255, 156, 53);*/"
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
          <li>
            <a class="page-scroll" href="#about">Dembora</a>
          </li>
          <li>
            <a class="page-scroll" href="#news">Noticias</a>
          </li>
          <li>
            <a class="page-scroll" href="#multimedia">Multimedia</a>
          </li>
          <li>
            <a class="page-scroll" href="#develop">Desarrollo</a>
          </li>
          {{--
                    <li>
                      <a class="page-scroll" href="#multimedia">Multimedia</a>
                    </li>
          --}}
          <li>
            <a class="page-scroll" href="#joincommunity">Comunidad</a>
          </li>
          <li>
            <a class="page-scroll" href="{!! url('/quienessomos') !!}">¿Qui&eacute;nes Somos?</a>
          </li>
          @if (Auth::guest())
            <li>
              <a class="page-scroll" href="{!! url('/login') !!}">Acceso</a>
            </li>
            <li>
              <a class="page-scroll" href="{!! url('/register') !!}">Registro</a>
            </li>
          @else
            <li><a href="{{ url('/posts') }}"><i class="fa fa-btn fa-sign-out"></i>Volver al sitio</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
          @endif


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

            {{--
                          <span style="font-family: Coolvetica;color:#c43d23;" class="brand-heading">Skilled</span>
                          <span style="font-family: Coolvetica;color:#d5822d;" class="brand-heading">Studio</span>
            --}}
            <img width="50%" src="{!! asset('img/backgrounds/Demborafinal.png') !!}" alt="">

            <p class="intro-text">
              <br>
              <br>
            </p>
            <a href="#about" class="btn btn-circle page-scroll">
              <i class="fa fa-angle-double-down animated"></i>
            </a>
            <br>
            <br>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="about">
    <br>
    <br>
    <br>
    <br>
    <div>
      <!-- About Section -->
      <div class="container content-section text-center">
        <div>
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">

              <h3 style="text-transform: none;font-family: Coolvetica;color:#d5822d;
              /*text-shadow: 0 0 10px rgba(255, 145, 0, 0.93);*/
              ">
                {{utf8_decode(utf8_encode('En un mundo dominado por  fuerzas elementales,  Samin, un joven aprendiz de chamán, tras la muerte de su maestro deberá emprender un viaje para hallar respuestas. La búsqueda no será fácil, Samin se  verá obligado a desafiar a diferentes criaturas elementales para así obtener la verdad. Con el paso del tiempo, Samin irá  descubriendo que su destino ya estaba escrito.'))}}
              </h3>

              <h4 style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">Pronto</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Download Section -->
  <section id="news" class="content-section text-center">
    <div class="download-section"
         style="background: url(../img/backgrounds/Fondos.png) no-repeat center center scroll;">
      <div class="container">
        <div class="col-lg-12 ">
          <h2 style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">Noticias</h2>
          <p style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">¡VEN A DESCUBRIR TODOS LOS MISTERIOS QUE ESCONDE DEMBORA, EL SECRETO DE LA MAGIA!</p>

          <div class="row">

            @foreach($posts as $key => $post)
              @if($key < 4)
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                  @foreach($post->image as $key => $image)


                    <a href="{{url('/posts/'.$post->id)}}" class="thumbnail" style="padding:0px;">
                      {{Html::image('/posts_images/'.$image->image,
                        $alt="Photo", $attributes = array('style'=>
                        'width:auto;height:auto;max-width:100%;', 'class'=>'img-responsive'))}}
                    </a>



                  @endforeach

                  @if(count($post->image)==0)
                    <a href="{{url('/posts/'.$post->id)}}" class="thumbnail" style="padding:0px;">
                      {{Html::image('/img/backgrounds/iconoCargando.gif',
                        $alt="Photo", $attributes = array('style'=>
                        'width:100%;height:100%;max-width:300px;max-height:300px;'))}}
                    </a>
                  @endif

                  <h5><a href="{{url('/posts/'.$post->id)}}">{{substr($post->title,0,60)}}</a></h5>
                  {{--<h6>{{substr($post->body, 0,40).'...'}}</h6>--}}

                  <a href="{{url('/posts/'.$post->id)}}"
                     style="color:#fc6000;border:solid 1px #fc6000;"
                     class="btn btn-default btn-xs">
                    Ver más
                  </a>
                </div>
              @endif
            @endforeach

          </div>
          <br><br>
          <a href="{{url('/posts')}}" class="btn btn-default btn-lg">
            Buscar más noticias
          </a>
        </div>
      </div>
    </div>
  </section>


  <!-- Multimedia Section -->
  <section id="multimedia" class="content-section text-center">
    <div class="download-section"
         style="background: url(../img/backgrounds/Fondos4.png) no-repeat center center scroll;">
      <div class="container">
        <div class="col-lg-12">
          <h2 style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">Multimedia</h2>
          <p style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">¡VEN A DESCUBRIR TODOS LOS CONTENIDOS MULTIMEDIAS QUE ESCONDEN EL SECRETO DE LA MAGIA!</p>

          <div class="row">
            @foreach($multimedias as $key => $multimedia)
              <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="embed-responsive embed-responsive-4by3">
                  <iframe class="embed-responsive-item"
                          src="{{str_replace('watch?v=', 'embed/',$multimedia->youtube_link)}}">
                  </iframe>
                  @if(!$multimedia->youtube_link)
                    <a href="{{url('/multimedia/'.$multimedia->id)}}" class="thumbnail" style="padding:0px;">
                      {{Html::image('/img/backgrounds/iconoCargando.gif',
                        $alt="Photo", $attributes = array('style'=>
                        'width:100%;height:100%;max-width:300px;max-height:300px;')) }}
                      <div class="caption">
                        El video no se encuentra disponible
                      </div>
                    </a>
                  @endif
                </div>
                <br>
                <h5><a href="{{url('/multimedia/'.$multimedia->id)}}">{{substr($multimedia->title,0,60)}}</a></h5>
                {{--<h6>{{substr($multimedia->body, 0,40).'...'}}</h6>--}}

                <a href="{{url('/multimedia/'.$multimedia->id)}}"
                   style="color:#fc6000;border:solid 1px #fc6000;"
                   class="btn btn-default btn-xs">
                  Ver más
                </a>
              </div>
            @endforeach
          </div>
          <br>

          <a href="{{url('/multimedia')}}" class="btn btn-default btn-lg">
            Mira nuestros videos
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Develop Section -->
  <section id="develop" class="content-section text-center">
    <div class="download-section"
         style="background: url(../img/backgrounds/Fondos7.png) no-repeat center center scroll;">
      <div class="container">
        <div class="col-lg-12">
          <h2 style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">Desarrollo</h2>
          <p style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">
            {{utf8_decode(utf8_encode('Dembora es un videojuego  de plataforma  que conecta  la fantasía con la magia y que además nos invita a reconectarnos con la esencia precolombina.  Dembora se dirige a un público con ganas de descubrir nuevas experiencia y que deseen envolverse en un mundo  mágico  cargado de misterios'))}}
          </p>
          <div class="row">

            @foreach($posts as $key => $post)
              @if($key >= 4)
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                  @foreach($post->image as $key => $image)
                    <a href="{{url('/posts/'.$post->id)}}" class="thumbnail" style="padding:0px;">
                      {{Html::image('/posts_images/'.$image->image,
                        $alt="Photo", $attributes = array('style'=>
                        'width:auto;height:auto;max-width:100%;', 'class'=>'img-responsive'))}}
                    </a>
                  @endforeach

                  @if(count($post->image)==0)
                    <a href="{{url('/posts/'.$post->id)}}" class="thumbnail" style="padding:0px;">
                      {{Html::image('/img/backgrounds/iconoCargando.gif',
                        $alt="Photo", $attributes = array('style'=>
                        'width:100%;height:100%;max-width:300px;max-height:300px;'))}}
                    </a>
                  @endif

                  <h5><a href="{{url('/posts/'.$post->id)}}">{{substr($post->title,0,60)}}</a></h5>
                  {{--<h6>{{substr($post->body, 0,40).'...'}}</h6>--}}

                  <a href="{{url('/posts/'.$post->id)}}"
                     style="color:#fc6000;border:solid 1px #fc6000;"
                     class="btn btn-default btn-xs">
                    Ver más
                  </a>
                </div>
              @endif
            @endforeach

            {{--
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                      <a href="#!" class="thumbnail" style="padding:0px;">
                        {{Html::image('/img/backgrounds/iconoCargando.gif',
                          $alt="Photo", $attributes = array('style'=>
                          'width:auto;height:auto;max-width:100%;', 'class'=>'img-responsive')) }}
                      </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                      <a href="#!" class="thumbnail" style="padding:0px;">
                        {{Html::image('/img/backgrounds/iconoCargando.gif',
                          $alt="Photo", $attributes = array('style'=>
                          'width:auto;height:auto;max-width:100%;', 'class'=>'img-responsive')) }}
                      </a>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                      <a href="#!" class="thumbnail" style="padding:0px;">
                        {{Html::image('/img/backgrounds/iconoCargando.gif',
                          $alt="Photo", $attributes = array('style'=>
                          'width:auto;height:auto;max-width:100%;', 'class'=>'img-responsive')) }}
                      </a>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                      <a href="#!" class="thumbnail" style="padding:0px;">
                        {{Html::image('/img/backgrounds/iconoCargando.gif',
                          $alt="Photo", $attributes = array('style'=>
                          'width:auto;height:auto;max-width:100%;', 'class'=>'img-responsive')) }}
                      </a>

                    </div>

            --}}

          </div>

          <br>
          <a href="{{url('https://trello.com/demboradevelopment')}}" target="_blank" class="btn btn-default btn-lg">
            Ver más sobre el desarrollo
          </a>
        </div>
      </div>
    </div>
  </section>


  <!-- Join Section -->
  <section id="joincommunity" class="content-section text-center">
    <div class="download-section"
         style="background: url(../img/backgrounds/Fondos8.png) no-repeat center center scroll;">
      <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
          <h2 style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">&Uacute;nete a Nuestra Comunidad</h2>
          <a href="https://www.facebook.com/skilledstudio/?fref=ts" target="_blank" class="btn btn-default btn-lg">
            &Uacute;nete a nuestra comunidad
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="content-section text-center">
    <div class="download-section"
         style="background: url(../img/backgrounds/Fondos3.5.png) no-repeat center center scroll;">
      <div class="">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <h2 style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">SÍGUENOS EN NUESTRAS REDES SOCIALES</h2>
            <span
              style="font-size: 1.8em;/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">Para que puedas sumergirte en un mundo dominado por fuerzas elementales</span>
          </div>
        </div>
        <br>
        {{--<p>Y entérate de todo lo que sucede con nuestro equipo</p>--}}
        <ul class="list-inline banner-social-buttons">

          <li>
            <a style="padding: 0px;" href="https://www.facebook.com/skilledstudio/?fref=ts" target="_blank" class="btn"><i
                class="fa fa-twitter fa-fw"></i>
              <span class="network-name">
                <img width="96" height="96" class="media-object social-images"
                     src="{!! asset('img/socialIcons/facebook.png') !!}" alt="">
              </span>
            </a>
          </li>

          <li>
            <a style="padding: 0px;" href="https://twitter.com/skilledstudio" target="_blank" class="btn"><i
                class="fa fa-twitter fa-fw"></i>
              <span class="network-name">
                <img width="96" height="96" class="media-object social-images"
                     src="{!! asset('img/socialIcons/twitter.png') !!}" alt="">
              </span>
            </a>
          </li>

          <li>
            <a style="padding: 0px;" href="https://trello.com/demboradevelopment" target="_blank" class="btn"><i
                class="fa fa-twitter fa-fw"></i>
              <span class="network-name">
                <img width="96" height="96" style="border-radius: 5px;" class="media-object social-images"
                     src="{!! asset('img/socialIcons/trello.png') !!}" alt="">
              </span>
            </a>
          </li>

          <li>
            <a style="padding: 0px;" href="https://www.youtube.com/c/skilledstudio" target="_blank" class="btn"><i
                class="fa fa-twitter fa-fw"></i>
              <span class="network-name">
                <img width="96" height="96" class="media-object social-images"
                     src="{!! asset('img/socialIcons/youtube.png') !!}" alt="">
              </span>
            </a>
          </li>

          <li>
            <a style="padding: 0px;" href="#!" target="_blank" class="btn"><i class="fa fa-twitter fa-fw"></i>
              <span class="network-name">
                <img width="96" height="96" class="media-object social-images"
                     src="{!! asset('img/socialIcons/gplus.png') !!}" alt="">
              </span>
            </a>
          </li>

        </ul>
        <p style="color:#fc6000;">contacto : <a style="color:#fc6000;"
                                                href="mailto:info@skilledstudio.com">info@skilledstudio.com</a>
        </p>
      </div>

    </div>
  </section>

  <!-- Map Section -->
  {{--<div id="map"></div>--}}

    <!-- Footer -->
  <footer>
    <div class="container text-center">
      <p style="/*text-shadow: 0 0 5px rgb(255, 255, 249);*/">Copyright &copy; Dembora&SkilledStudio {{date('Y')}}</p>
    </div>
  </footer>

  <!-- jQuery -->


  <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
  <!--
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
  -->


  </body>
@endsection

