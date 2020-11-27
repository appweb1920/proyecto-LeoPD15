@extends('layouts.principal')

@section('content')
<div class="container">
    
        <h2 class="center-align">Registro de Usuario</h2>

        <div class="row">
            <form action="">
                @csrf
                <div class="row">
                    <div class="input-field col s6 offset-s3" style=" margin-top:20px;">
                        
                        <input type="text" name="correo" placeholder="Aqui va el texto" id="correo">
                        <label for="correo">Correo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3" style=" margin-top:20px;">
                        
                        <input type="text" name="nombre" placeholder="Aqui va el texto" id="nombre">
                        <label for="nombre">Nombre de usuario</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3" style="margin-top:20px;">
                        
                        <input type="password" name="password" placeholder="Aqui va la contraseña" id="password">
                        <label for="password">Contraseña</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3" style="margin-top:20px;">
                        <input type="text" name="tipo" id="tipo">
                        <label for="tipo">Tipo de usuario</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s2 offset-s5" style="text-align: center;">
                        <input type="submit" name="" id="" value="Registrar" class="btn waves-effect"></input>
                    </div>
                </div>
                
            </form>
        </div>


</div>


@endsection