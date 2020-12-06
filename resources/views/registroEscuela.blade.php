@extends('layouts.principal')

@section('content')
<div class="row">
    <div class="col s12"> <!--Contenedor de todo-->
        <div class="row"> <!--Contenedor escuelas y registro de escuelas-->
            <div class="col s3">
                <h2>Escuelas</h2>
            </div>
            <div class="col s8">
                <div class="row">   
                    <h2 class="center-align">Registro de Escuela</h2>
                    <div class="col s8 offset-s3">
                        <form action="">
                            @csrf
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="text" name="nombre" id="nombre">
                                    <label for="nombre">Nombre de la escuela</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
                                    <select name="grado" id="grado">
                                        <option value="" disabled selected>Eligir el grado</option>
                                        <option value="kinder">Kinder</option>
                                        <option value="primaria">Primaria</option>
                                        <option value="secundaria">Secundaria</option>
                                        <option value="preparatoria">Preparatoria</option>
                                    </select>
                                    <label for="grado">Grado</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
                                    <select name="turno" id="turno">
                                        <option value="matutino">Matutino</option>
                                        <option value="vespertino">Vespertino</option>
                                    </select>
                                    <label for="turno">Turno (Matutino/Vespertino)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
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
@endsection