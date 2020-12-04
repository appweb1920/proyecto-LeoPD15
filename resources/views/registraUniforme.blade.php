@extends('layouts.principal')

@section('content')
<br><br><br>
<div class="container">
    <div class="row">
        <h1 class="center-align">Registro de uniforme</h1>
        <br><br><br>
        <div class="col s10 offset-s2">
            <form action="">
                @csrf
                <div class="row">
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1" selected>Escuela 1</option>
                        <option value="2">Escuela 2</option>
                        <option value="3">Escuela 3</option>
                    </select>
                    <label>Escuela</label>
                </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <input type="text" name="genero" id="genero">
                        <label for="genero">Género(niño/niña)</label>
                    </div>
                </div>                    
                <div class="row">
                    <div class="input-field col s8">
                        <input type="number" name="talla" id="talla">
                        <label for="talla">Talla</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <input type="number" name="cantidad" id="cantidad">
                        <label for="cantidad">Cantidad</label>
                    </div>
                </div>
                <div class="row">                    
                    <div class="input-field col s8">
                        <input type="number" name="costo" id="costo">
                        <label for="costo">Costo</label>
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
