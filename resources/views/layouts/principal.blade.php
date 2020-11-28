<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Scripts -->
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".dropdown-trigger").dropdown();
        })
    </script>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body{
            font-family: 'Alatsi', sans-serif;
        }
        nav{
            background-color: #48B7CA;
        }
        .btn{
            background-color: #D92534;
            margin-top:40px;
        }
        .btn:hover{
            background-color: #48B7CA;
        }
        a{
            color:#48B7CA;
        }
        a:hover{
            color:#D92534;
        }
        .uniforme{
            border:thin black solid; width:200px; height:200px; margin: 30px;
        }
        /*margin - arriba/derecha/abajo/izquierda*/
    </style>
</head>
<body>
    <div>
        <ul id="dropdown1" class="dropdown-content">
            <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
        </ul>

        <nav>
            <div class="nav-wrapper">
            <a href="#" class="brand-logo"><img src="logo.jpg" alt="#" style="width:140px; height: auto;"></a>
            @guest
                <ul id="nav-mobile" class="right hide-on-med-and-down"> <!--Pegado a la derecha-->            
                    <li><a href="/loginLU" data-target="dropdown1">Log In</a></li>
                </ul>
            @else
                @if(Auth::user()->rol == 'Administrador')
                <ul id="nav-mobile" class="right hide-on-med-and-down"> <!--Pegado a la derecha-->            
                    <li><a href="/registro" data-target="dropdown1">Registro</a></li>
                </ul>
                @endif
                
                <ul id="nav-mobile" class="right hide-on-med-and-down"> <!--Pegado a la derecha-->            
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{Auth::user()->name}}
                    <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul> 

            @endguest
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>