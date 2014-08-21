<!DOCTYPE html>
<!-- Creasitenet -->
<!-- Edouard Boissel -->
<!-- Réalisation de sites internet -->

<!-- 
/***********************************/
Réalisation du site : Edouard Boissel [Creasitenet] 
URL : http://www.creasitenet.com
Contact: creasitenet.com@gmail.com
/***********************************/
-->

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo
    	@section('title')
          Todo
    	@stop
	  </title>
    <meta name="description" content="Todo" />
    <meta name="keywords" content="Todo par Creasitenet." />
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon" type="image/ico" />
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon" type="image/ico" />
    <meta name="_token" content="{{ csrf_token() }}" />
    <base href="{{ URL::to('/') }}/" />

    <!-- CSS -->
    <!-- Bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <!-- Plugins -->
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/growl/jquery.growl.css') }}" rel="stylesheet" />

    <!-- Customs -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/switch.css') }}" rel="stylesheet" />

    <!-- JS -->
    <script src="{{ asset('assets/plugins/jquery/jquery-2.1.1.min.js') }}" type="text/javascript" ></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body> 

    <!-- CONTAINER -->
    <div id="container">          
        @include('_header')
        <!-- Container -->
        <div class="container"> 
            @yield('content')
        </div>
        @include('_footer')    
    </div>
    <!-- // CONTAINER -->

    <!-- Preloader -->
    <div class="preloader"> 
        <img src="{{ asset('assets/img/preloader.gif') }}" />
    </div>

  <!-- JS -->
  <!-- Bootstrap -->   
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <!-- Plugins -->
  <script src="{{ asset('assets/plugins/growl/jquery.growl.js') }}" type="text/javascript"></script>
  <!-- Customs -->
  <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>

