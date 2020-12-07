@extends('layouts.principal')

@section('content')
<br><br><br>
<div class="container">
    <div class="row">
        <h1 class="center-align">Registro de uniforme</h1>
        <h3 class="center-align"><a href="/Escuelas">Escuelas</a></h3>
        <br><br><br>
        <div class="col s10 offset-s2">
            <form action="/registro/Uniforme/Guardar" method="POST">
                @csrf
                <div class="row">
                    <div class="input-field col s8">
                        <select name="escuela" id="escuela">
                            <option value="" disabled selected>Elige la escuela</option>
                            <option value="1">Escuela 1</option>
                            <option value="2">Escuela 2</option>
                            <option value="3">Escuela 3</option>
                        </select>
                        <label>Escuela</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <select name="genero" id="genero">
                            <option value="niño">Niño</option>
                            <option value="niña">Niña</option>
                        </select>
                        <label for="genero">Género</label>
                    </div>
                </div>                    
                <div class="row">
                    <div class="input-field col s8">
                        <input type="number" name="talla" id="talla" value="{{old('talla')}}">
                        <label for="talla">Talla</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <input type="number" name="cantidad" id="cantidad" value="{{old('cantidad')}}">
                        <label for="cantidad">Cantidad</label>
                    </div>
                </div>
                <div class="row">                    
                    <div class="input-field col s8">
                        <input type="number" name="precio" id="precio" value="{{old('precio')}}">
                        <label for="precio">Precio</label>
                    </div>
                </div>
                <div class="row">                    
                    <div class="input-field col s8" >
                    <h6>Foto</h6>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Archivo</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
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
<br>
<br>
<br>
<br>
<br>


@endsection
