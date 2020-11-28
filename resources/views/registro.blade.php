@extends('layouts.principal')

@section('content')
<div class="row">
    <div class="col s12" >
        <div class="row">
            <div class="col s3" >
                <h2>Usuarios</h2>
                <div class="row">
                    <div class="col s12">
                        <h2>Usuario 1</h2>
                        <h2>Usuario 2</h2>
                    </div>
                </div>
            </div>
            <div class="col s9 " >
                <h2 class="center-align">Registro de Usuario</h2>
                <div class="row">
                    <div class="col s9 offset-s3">
                        <form action="">
                            @csrf
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="text" name="nombre" id="nombre">
                                    <label for="nombre">Nombre de usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="text" name="correo" id="correo">
                                    <label for="correo">Correo</label>
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
                                    <input type="text" name="tipo" id="tipo">
                                    <label for="tipo">Tipo de usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s2 offset-s4" style="text-align: center;">
                                    <input type="submit" name="" id="" value="Registrar" class="btn waves-effect"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection