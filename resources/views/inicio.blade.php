@extends('layouts.principal')

@section('content')
<div class="row">
    <div class="col s1" >
        <div class="row">
            <div class="col s12"><p class="center-align"><b>Filtros</b></p></div>
        </div>
        <div class="row">
            <div class="col s12">
                <p class="center-align"><a href="">Preescolar</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <p class="center-align"><a href="">Primaria</a></p>
            </div>
        </div>
        
        <div class="row">
            <div class="col s12">
                <p class="center-align"><a href="">Secundaria</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <p class="center-align"><a href="">Equipamiento</a></p>
            </div>
        </div>
    </div>
    <div class="col s10 offset-s1" style="border: thin red solid;">
        <div class="row">
            <div class="col s12">
                @if(isset($uniformes))

                @else
                    <h2 class="center-align">No se encontraron uniformes</h2>
                    @if(Auth::user() != null)
                    <h2 class="center-align"><a href="">Registrar uniforme</a></h2>
                    @endif  

                @endif
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