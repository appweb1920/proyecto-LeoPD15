@extends('layouts.principal')

@section('content')
<div class="container" >
    <h2 class="center-align">Inicio de sesión</h2>
    <div class="row ">
        <form method="POST" action="{{ route('login') }}" class="col s12" >
        @csrf
            <div class="row">
                <div class="input-field col s6 offset-s3" style=" margin-top:40px;">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="name" placeholder="Aqui va el texto" id="name">
                    <label for="name">Nombre de usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 offset-s3" style="margin-top:40px;">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="password" placeholder="Aqui va la contraseña" id="password">
                    <label for="password">Contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2 offset-s5" style="text-align: center;">
                    <input type="submit" name="" id="" value="Entrar" class="btn waves-effect"></input>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection