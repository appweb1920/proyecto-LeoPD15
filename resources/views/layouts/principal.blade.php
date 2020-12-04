<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    
    <title>Los Uniformes</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Scripts -->
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/2145993086.js" crossorigin="anonymous"></script>
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
        <nav>
            <div class="nav-wrapper">
            <a href="/inicio" class="brand-logo"><img src="logo.jpg" alt="#" style="width:140px; height: auto;"></a>
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
    <footer class="page-footer" style="background-color: #D92534;">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
</body>
</html>