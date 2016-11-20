<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <style>
    @font-face {
      font-family: Coolvetica;
      src: url(/fonts/coolvetica_rg.ttf);
    }
    body {
      font-weight: 200;
      font-family: Coolvetica;

    }
  </style>
  <title>Skilled Studio</title>



  <!-- Bootstrap Core CSS -->
  {!!Html::style('css/style.css')!!}
  {!!Html::style('css/bootstrap.min.css')!!}


    <!-- Custom CSS -->
  {!!Html::style('css/sb-admin.css')!!}

    <!-- Morris Charts CSS -->

    <!-- Custom Fonts -->
  {!!Html::style('font-awesome/css/font-awesome.min.css')!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  {!!Html::script('js/html5shiv.js')!!}
  {!!Html::script('js/respond.min.js')!!}
  <![endif]-->


  {!!Html::script('js/respond.min.js')!!}
  {!!Html::script('js/html5shiv.js')!!}

  {{--{!!Html::style('css/grayscale.min.css')!!}--}}
  {!!Html::style('css/grayscale.css')!!}

  <style>
    /*
    body {
      font-family: 'Lato';
    }
    */
    .fa-btn {
      margin-right: 6px;
    }
  </style>

</head>

<body>

<div id="">



  @yield('content')

    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
{!!Html::script('js/jquery.js')!!}


  <!-- Bootstrap Core JavaScript -->
{!!Html::script('js/bootstrap.min.js')!!}

  <!-- Morris Charts JavaScript -->
{!!Html::script('js/grayscale.min.js')!!}
{!!Html::script('js/jquery.easing.min.js')!!}

</body>

</html>