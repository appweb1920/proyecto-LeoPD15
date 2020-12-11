@extends('layouts.principal')

@section('content')
@if(!is_null(Auth::user()))
<br><br><br>
<div class="container">
    <div class="row">
        <h1 class="center-align">Registro de uniforme</h1>
        <h3 class="center-align"><a href="/Escuelas">Escuelas</a></h3>
        <br><br><br>
        <div class="col s10 offset-s2">
            <form action="/registro/Uniforme/Guardar" method="POST" enctype="multipart/form-data">
                @csrf
                @if(!is_null($escuelas))
                <div class="row">
                    <div class="input-field col s8">
                        <select name="idEscuelaUniforme" id="idEscuelaUniforme">                            
                            <option value="" disabled selected>Elige la escuela</option>
                            @foreach($escuelas as $e)
                            <option value="{{$e->idEscuela}}">{{$e->nombre}} - {{$e->grado}}</option>
                            @endforeach
                        </select>
                        <label>Escuela</label>
                    </div>
                    @error('escuela')
                    <span style="background-color:#E57373;"><b>{{ $message }}</b></span>
                    @enderror
                </div>
                @else
                <div class="row">
                    <span>No hay <a href="/Escuelas">escuelas</a> registradas!</span>
                </div>
                @endif
                <div class="row">
                    <div class="input-field col s8">
                        <select name="genero" id="genero">
                            <option value="niño">Niño</option>
                            <option value="niña">Niña</option>
                            <option value="unisex">Unisex</option>
                        </select>
                        <label for="genero">Género</label>
                    </div>
                    @error('genero')
                    <span style="background-color:#E57373;"><b>{{ $message }}</b></span>
                    @enderror       
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <select name="tipo" id="tipo">
                            <option value="deportivo">Deportivo</option>
                            <option value="diario">Diario</option>
                            <option value="gala">Gala</option>
                        </select>
                        <label for="tipo">Tipo</label>
                    </div>
                </div>
                <div class="row">                    
                    <div class="input-field col s8" >
                        <h6>Elige una foto</h6>        
                        <input type="file" name="foto" id="foto" accept="image/png, image/jpeg">
                    </div>
                    @error('archivoInvalido')
                    <span style="background-color:#E57373;"><b>{{ $message }}</b></span>
                    @enderror
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
<br><br><br><br><br>
@else
<meta http-equiv="refresh" content="0; URL=/loginLU"/>
@endif

@endsection
