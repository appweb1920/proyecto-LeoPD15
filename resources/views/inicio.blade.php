@extends('layouts.principal')

@section('content')
<div class="row">
@if(!is_null(Auth::user()))
    <div class="col s2" >
        <div class="row">
            <div class="col s12 ">
                <a href="" class="waves-effect waves-light btn">Venta</a>
            </div>
        </div>
        @if(Auth::user()->rol == "administrador" || Auth::user()->rol == "privilegio")
        <div class="row">
            <div class="col s12 ">
                <a href="/Cotizar" class="waves-effect waves-light btn">Cotizar</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 ">
                <a href="/Cotizar" class="waves-effect waves-light btn">Equipamiento</a>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col s12 ">
                <a href="/registro/Uniforme" class="waves-effect waves-light btn">R-Uniforme</a>
            </div>
        </div>
        @if(Auth::user()->rol == "administrador")
        <div class="row">
            <div class="col s12 ">
                <a href="/Escuelas" class="waves-effect waves-light btn">Escuela</a>
            </div>
        </div>
        @endif
    </div>
@endif
    <div class="col s9 ">
        <div class="row">
            <div class="col s12">
                @if(!is_null($uniformes))
                    <div class="row"><h3 class="center-align">Uniformes</h3></div>
                    <div class="col s12" style="display: flex;flex-wrap: wrap;">
                    @foreach($uniformes as $u)      
                        <a href="/Uniforme/{{$u->idUniforme}}"><div><img class="uniforme"src="{{ asset('/storage/uniformes/'.$u->foto) }}" alt=""></div></a>
                    @endforeach
                    </div>
                @else
                    <h2 class="center-align">No se encontraron uniformes</h2>
                    @if(Auth::user() != null)
                    <h2 class="center-align"><a href="/registro/Uniforme">Registrar uniforme</a></h2>
                    @endif  
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="row"><h3 class="center-align">Equipamiento</h3></div>
            </div>
        </div>
    </div>

</div>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
@endsection