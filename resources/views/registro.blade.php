
@extends('layouts.principal')

@section('content')

@if(is_null(Auth::user()))
<p>Error, necesitas ser administrador para entrar <a href="/inicio">Regresar</a></p>
@elseif(Auth::user()->rol == 'administrador')
<div class="row">
    <div class="col s12" >
        <div class="row">
            <div class="col s3" >
                <h2>Usuarios</h2>
                <div class="row">
                    <div class="col s12"> 
                        @if(isset($usuarios))
                            @foreach($usuarios as $u)
                                <div class="row">
                                <script type="text/javascript">
                                    function Revisa(){
                                        return(confirm("Deseas eliminar al usuario?"));
                                    }
                                </script>
                                    <ul class="collection">
                                        <li class="collection-item">Nombre : {{$u->name}}
                                        <a href="/usuarios/elimina/{{$u->id}}" style="color:#D92534;" class="secondary-content" id="EliminarLink" onclick="return Revisa()"> 
                                        Eliminar
                                        </a>
                                        </li>
                                        <li class="collection-item">Rol: {{$u->rol}}</li>
                                    </ul>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col s9 " >
                <h2 class="center-align">Registro de Usuario</h2>
                <div class="row">
                    <div class="col s9 offset-s3">
                        <form method="POST" action="{{ route('register') }}" class="col s12">
                            @csrf
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="text" name="name" id="name">
                                    <label for="name">Nombre de usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="text" name="email" id="email" >
                                    <label for="email">Correo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="password" name="password" id="password">
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="password" id="password-confirm" name="password_confirmation">
                                    <label for="password-confirm">Confirmar contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="text" name="rol" id="rol">
                                    <label for="rol">Rol de usuario (general/privilegio)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s2 offset-s4" style="text-align: center;">
                                    <button type="submit" class="btn waves-effect">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection