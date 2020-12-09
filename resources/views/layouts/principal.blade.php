<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <title>Los Uniformes</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Scripts -->
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/2145993086.js" crossorigin="anonymous"></script>
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <script type="text/javascript">
        $(document).ready(function(){
            $('select').formSelect();$('.fixed-action-btn').floatingActionButton();
        });
        function Revisa(){
            return(confirm("Seguro que desea eliminar?"));
        }
    </script>
    <style>
        body{
            font-family: 'Alatsi', sans-serif;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        nav{
            background-color: #48B7CA;
        }
        .btn{
            background-color: #D92534;
            margin-top:40px;
        }
        .btn-floating{
            background-color: #D92534;
        }
        .btn:hover{
            background-color: #48B7CA;
        }
        a{
            color:#48B7CA;
        }
        a:hover{
            color:#000000;
        }
        .uniforme{
            border:thin black solid; width:200px; height:200px; margin: 30px;
        }
        .imagen{
            width:198px; height:198px;
        }
        /*margin - arriba/derecha/abajo/izquierda*/
    </style>
</head>
<body>
    <div>
        <nav>
            <div class="nav-wrapper">
            <a href="/inicio" class="brand-logo"><img src="{{ asset('/storage/logo.jpg') }}" alt="#" style="width:140px; height: auto;"></a>
            @guest
                <ul id="nav-mobile" class="right hide-on-med-and-down"> <!--Pegado a la derecha-->            
                    <li><a href="/loginLU" data-target="dropdown1">Log In</a></li>
                </ul>
            @else
                <ul id="nav-mobile" class="right hide-on-med-and-down"> <!--Pegado a la derecha-->            
                    @if(Auth::user()->rol == 'administrador')    
                    <li><a href="/usuarios" data-target="dropdown1">Administrar Usuarios</a></li>
                    @endif
                    <li><a href="#" >{{Auth::user()->name}}
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:#D92534;">
                        Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>   
                </ul> 
            @endguest
            </div>
        </nav>
        @yield('content')
    </div>
    <br><br><br><br><br>
    <!--
    <footer class="page-footer" style="background-color: #D92534;">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Los Uniformes</h5>
                <p class="grey-text text-lighten-4">Dirección: Francisco I. Madero</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contacto</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">1234567789</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
    </footer>-->
</body>
</html>