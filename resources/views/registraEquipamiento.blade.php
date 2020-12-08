@extends('layouts.principal')

@section('content')
<div class="container">

    <h1 class="center-align">Registro de uniforme</h1><br><br>
        <div class="row">
            <div class="col s10 offset-s2">
                <form action="/Equipamiento/guardar" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="input-field col s8">
                            <input type="text" name="nombre" id="nombre" class="validate">
                            <label for="nombre">Nombre del equipamiento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input type="number" name="precio" id="precio" class="validate" min="0">
                            <label for="precio">Precio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input type="text" name="talla" id="talla" class="validate" min="0">
                            <label for="talla">Talla(opcional)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input type="number" name="cantidad" id="cantidad" class="validate" min="0">
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
                            <button type="submit" class="btn waves-effect">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


</div>
@endsection