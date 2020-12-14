@extends('layouts.principal')

@section('content')
@if(!is_null(Auth::user()))
<div class="container">
<br><br><br>
    <div class="row">
        <div class="col s12" >
            <div class="row">
                <div class="col s3">
                    <div>
                        <a href="/Uniforme/{{$uniforme->idUniforme}}">
                        <img class="imagen" src="{{ asset('/storage/uniformes/'.$uniforme->foto) }}" alt="{{ asset('/storage/logo.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col s9">
                    <div class="row">
                        <h5>Escuela: {{$escuela->nombre}}</h5>
                    </div><br>
                    <div class="row">
                        <h5>Grado: {{$escuela->grado}}</h5>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col s12">
            <div class="row"><h3 class="center-align">Tallas</h3></div><br>
            <div class="row">
                <div class="col s3">
                    <div class="row"><h4 class="center-align">Disponibles</h4></div>
                    @if(is_null($tallas))
                        <b><p>No hay tallas registradas</p></b>
                    @else
                        @foreach($tallas as $t)
                            <div class="row">
                                <h5>Talla: {{$t->talla}}</h5>
                                <form action="/Talla/editar" method="POST">
                                @csrf
                                <input type="hidden" name="idTalla" id="idTalla" value="{{$t->idTalla}}">
                                <label for="precio">Precio</label>
                                <input type="text" name="precio" id="precio" value="{{$t->precio}}">
                                <label for="cantidad">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad" value="{{$t->cantidad}}">
                                <button type="submit" class="btn waves-effect">Modificar</button>
                                </form>
                                <a href="/talla/Eliminar/{{$t->idTalla}}"> <button class="btn waves-effect">Eliminar talla</button> </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col s6 offset-s2">
                    <div class="row"><h4 class="center-align">Nueva Talla</h4></div>
                    <div class="row">
                        <div class="col s12">
                            <form action="/Talla/Guardar" method="POST">
                            @csrf   
                                <input type="hidden" name="idTallaUniforme" id="idTallaUniforme" value="{{$uniforme->idUniforme}}">
                                <div class="row">
                                    <div class="input-field col s8 offset-s2">
                                        <input type="number" name="talla" id="talla" min="4" max="40">
                                        <label for="talla">Talla</label>
                                    </div>
                                    <div class="input-field col s8 offset-s2">
                                        <input type="number" name="cantidad" id="cantidad" min="0">
                                        <label for="cantidad">Cantidad</label>
                                    </div>
                                    <div class="input-field col s8 offset-s2">
                                        <input type="number" name="precio" id="precio" min="0">
                                        <label for="precio">Precio</label>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s2 offset-s5">
                                            <button type="submit" class="btn waves-effect">Registrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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