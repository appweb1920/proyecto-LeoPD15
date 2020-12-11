@extends('layouts.principal')

@section('content')
<br><br>
@if(!is_null($uniforme) && !is_null(Auth::user()))
<div class="container">
    <div class="row">Edición de uniforme</div>
    <div class="row center-align">
    <img class="imagen" src="{{ asset('/storage/uniformes/'.$uniforme->foto) }}" alt="{{ asset('/storage/logo.jpg') }}"></div>
    <div class="row">
        <div class="col s12">
            <form action="/Uniforme/edicion/guardar" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idUniforme" id="idUniforme" value="{{$uniforme->idUniforme}}">
                <div class="row">
                    <div class="col s8">
                        <select name="tipo" id="tipo">
                            @if($uniforme->tipo == "deportivo")<option value="deportivo" selected>Deportivo</option>
                            @else <option value="deportivo">Deportivo</option>
                            @endif
                            @if($uniforme->tipo == "diario")<option value="diario" selected>Diario</option>
                            @else <option value="diario">Deportivo</option>
                            @endif
                            @if($uniforme->tipo == "gala")<option value="gala" selected>Gala</option>
                            @else <option value="gala">Deportivo</option>
                            @endif
                        </select>
                        <label for="tipo">Tipo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s8">
                        <select name="genero" id="genero">
                            @if($uniforme->genero == "niño") <option value="niño" selected>Niño</option>
                            @else <option value="niño">Niño</option> 
                            @endif
                            @if($uniforme->genero == "niña") <option value="niña" selected>Niña</option>
                            @else <option value="niña">Niña</option> 
                            @endif
                            @if($uniforme->genero == "unisex") <option value="unisex" selected>Unisex</option>
                            @else <option value="unisex">Unisex</option> 
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8" >
                        <h6>Elige una nueva foto</h6>        
                        <input type="file" name="foto" id="foto" accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <button type="submit" class="btn waves-effect">Actualizar</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
</div>
@else
<meta http-equiv="refresh" content="0; URL=/inicio" />
@endif


@endsection