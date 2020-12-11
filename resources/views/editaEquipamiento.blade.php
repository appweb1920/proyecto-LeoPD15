@extends('layouts.principal')

@section('content')

@if(!is_null($equipamiento) && !is_null(Auth::user()))
<div class="container">
    <div class="row">Edición de Equipamiento</div>
    <div class="row center-align">
    <img class="imagen" src="{{ asset('/storage/equipamiento/'.$equipamiento->foto) }}" alt="{{ asset('/storage/logo.jpg') }}"></div>
    <div class="row">
        <div class="col s12">
            <form action="/Equipamiento/edicion/guardar" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idEquipamiento" id="idEquipamiento" value="{{$equipamiento->idEquipamiento}}">
                <div class="row">
                    <div class="input-field col s8">
                        <input type="text" name="nombre" id="nombre" class="validate" value="{{$equipamiento->nombre}}">
                        <label for="nombre">Nombre del equipamiento</label>
                    </div>
                </div>
                <div class="row">
                     <div class="input-field col s8">
                         <input type="number" name="precio" id="precio" class="validate" min="0" value="{{$equipamiento->precio}}">
                         <label for="precio">Precio</label>
                     </div>
                 </div>
                 <div class="row">
                     <div class="input-field col s8">
                         <input type="number" name="cantidad" id="cantidad" class="validate" min="0" value="{{$equipamiento->cantidad}}">
                         <label for="cantidad">Cantidad</label>
                     </div>
                 </div>
                 <div class="row">
                     <div class="input-field col s8" >
                         <h6>Elige una foto</h6>        
                         <input type="file" name="foto" id="foto" accept="image/png, image/jpeg">
                     </div>
                 </div>
                 <div class="row">
                     <div class="input-field col s8">
                         <button type="submit" class="btn waves-effect">Editar</button>
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