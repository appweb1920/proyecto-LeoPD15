@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
        <h3>Equipamiento</h3>
        <br><br>
        @if(isset($equipamiento))
            <div class="row">
                <div class="col s4">
                    <div class="row center-align"><h5>{{$equipamiento->nombre}}</h5>
                    <img class="imagen" src="{{ asset('/storage/equipamiento/'.$equipamiento->foto) }}" alt="{{ asset('/storage/logo.jpg') }}"></div>
                    <div class="row">
                        <div class="col s2"> <a href="/Equipamiento/elimina/{{$equipamiento->idEquipamiento}}" onclick="return Revisa()" style="color:red">Eliminar</a></div>
                        <br><div class="col s2"> <a href="">Editar</a> </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="row">
                        <div><h5>Talla: {{$equipamiento->talla}}</h5></div>
                    </div>
                    <div class="row">
                        <div><h5>Precio: {{$equipamiento->precio}}</h5></div>
                    </div>
                    <div class="row">
                        <div><h5>Disponible: {{$equipamiento->cantidad}}</h5></div>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="row">
            <h4 class="center-align">Venta</h4>
        </div>
    </div>
        @else
            <div><h5> No existe el equipamiento  <a href="/inicio">Regresar</a> </h5></div>
        
        </div>
         @endif
</div>

@endsection