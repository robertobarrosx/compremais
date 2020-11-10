<html>

<head>
    <title>Compre Mais @yield('title')</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script> --}}
    <link rel="stylesheet" href="{{ asset('sass/home.scss') }}">
    <!-- Font Awesome JS -->
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script> --}}
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" --}}
        {{-- integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"> --}}
    {{-- </script> --}}
 {{-- <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'> --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
 rel="stylesheet">

{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
<!-- Script -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
 integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
</script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
 integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
</script>

{{-- <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'> --}}
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: white;
            color: black;
            text-align: center;
        }

        body {
            background-color: #EDF7EF
        }

    </style>

</head>

<body>

    <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}"><img width="200" src="{{ asset('img/logo2.png') }}" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @if (Route::has('login'))
                @auth

                    <a href="{{ url('/dashboard') }}" class="btn link js-toggle-cart text-sm ">Painel de Controle</a>
                @else
                    <a href="{{ route('login') }}" class="btn link js-toggle-cart text-sm">Entrar</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn link js-toggle-cart ml-4 text-sm">Registrar</a>
                    @endif
                @endif

        @endif


          </ul>
          <form class="form-inline my-2 my-lg-0" method="get" >
            @csrf
            @method('GET')
            <input class="form-control mr-sm-2" type="text" name="q" placeholder="Pesquisar produto">
            <button class="btn btn-outline-success my-2 my-sm-0"  value="Search" type="submit">Pesquisar</button>
          </form>
        </div>
      </nav>



{{--
<div class="shop__header">

    {{-- <h1 class="shop__title">{{ config('app.name', 'Laravel') }}</h1> --}}

      {{-- <img width="120" src="{{ asset('img/logo2.png') }}" />

    @if (Route::has('login'))
      <div class="shop__text">
          @auth

              <a href="{{ url('/dashboard') }}" class="button js-toggle-cart text-sm ">Painel de Controle</a>
          @else
              <a href="{{ route('login') }}" class="button js-toggle-cart text-sm">Entrar</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="button js-toggle-cart ml-4 text-sm">Registrar</a>
              @endif
          @endif
      </div>
  @endif --}}


    @section('sidebar')

    @show

    <div class="container mt-5">
        @yield('content')
    </div>
    <div class="text-center footer">
        <h6>2020 - Roberto Barros</h6>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}

</body>

</html>
