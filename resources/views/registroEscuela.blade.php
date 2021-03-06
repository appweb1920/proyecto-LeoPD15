@extends('layouts.principal')

@section('content')
@if(!is_null(Auth::user()))
<br><br>
<div class="row" >
    <div class="col s12"> <!--Contenedor de todo-->
        <div class="row"> <!--Contenedor escuelas y registro de escuelas-->
            <div class="col s3">
                <h2>Escuelas</h2>
                <div class="row">
                    <div class="col s12">
                        @if(isset($escuelas))
                            @foreach($escuelas as $e)
                                <div class="row">
                                    <ul class="collection">
                                        <li class="collection-item"> Nombre:<a href=""> {{$e->nombre}}</a> 
                                        <a href="/Escuelas/elimina/{{$e->id}}" style="color:#D92534;" class="secondary-content" id="EliminarUniforme" onclick="return Revisa()"> 
                                        Eliminar
                                        </a>
                                        </li>
                                        <li class="collection-item">Grado: {{$e->grado}}</li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p>No hay escuelas</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col s8">
                <div class="row">   
                    <h2 class="center-align">Registro de Escuela</h2>
                    <div class="col s8 offset-s3">
                        <form action="/Escuelas/Guardar" method="POST">
                            @csrf
                            <div class="row">
                                <div class="input-field col s8">
                                    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
                                    <label for="nombre">Nombre de la escuela</label>
                                    @error('nombre')
                                    <span style="background-color:#E57373;color:white"><b>{{ $message }}</b></span>
                                    @enderror
                                </div>    
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s8">
                                    <select name="grado" id="grado">
                                        <option value="Kinder">Kinder</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                        <option value="Preparatoria">Preparatoria</option>
                                    </select>
                                    <label for="grado">Grado</label>
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
@else
<meta http-equiv="refresh" content="0; URL=/loginLU"/>
@endif

@endsection