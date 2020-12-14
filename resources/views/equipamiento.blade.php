@extends('layouts.principal')

@section('content')

@if(!is_null(Auth::user()))
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
                        <br><div class="col s2"> <a href="/Equipamiento/editar/{{$equipamiento->idEquipamiento}}">Editar</a> </div>
                    </div>
                </div>
                <div class="col s6">
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
                    <div class="col s6">
                        <div class="row">
                            <div class="col s10">
                                <form action="/Venta/Equipamiento" method="POST">
                                @csrf
                                    <input type="hidden" name="idVentaEquipamiento" id="idVentaEquipamiento" value="{{$equipamiento->idEquipamiento}}">
                                    <input type="hidden" name="talla" id="talla" value="{{$equipamiento->talla}}">
                                    <input type="hidden" name="nombre" id="nombre" value="{{$equipamiento->nombre}}">
                                    <input type="hidden" name="" id="">
                                    <div class="col s8">
                                        <input type="text" name="vendido" id="vendido">
                                        <label for="vendido">Cantidad a vender</label>
                                    </div>
                                    <div class="row" >  
                                        <div class="input-field col s8">
                                            <button type="submit" class="btn waves-effect" >Vender</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <meta http-equiv="refresh" content="0; URL=/inicio" />
        @endif
    </div>
    
    <div class="row">
        <h3>Ventas</h3>
        <div class="col s8 offset-s2">
            @if(!is_null($ventas))
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Talla</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $v)
                            <tr>
                                <th>{{$v->dia}}</th>
                                <th>{{$v->talla}}</th>
                                <th>{{$v->vendido}}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3>No se han registrado ventas</h3>
            @endif
        </div>
    </div>
</div>
@else
<meta http-equiv="refresh" content="0; URL=/loginLU"/>
@endif

@endsection