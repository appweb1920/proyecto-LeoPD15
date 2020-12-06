@extends('layouts.principal')

@section('content')
<div class="row">
    <div class="col s2" >
        
        <div class="row">
            <div class="col s12">
                <a href="" class="waves-effect waves-light btn">Venta</a>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <a href="" class="waves-effect waves-light btn">Cotizar</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col s12">
                <a href="/registro/Uniforme" class="waves-effect waves-light btn">R-Uniforme</a>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <a href="/Escuela" class="waves-effect waves-light btn">Escuela</a>
            </div>
        </div>
    </div>
    <div class="col s9 " style="border: thin red solid;">
        <div class="row">
            <div class="col s12">
                @if(isset($uniformes))

                @else
                    <h2 class="center-align">No se encontraron uniformes</h2>
                    @if(Auth::user() != null)
                    <h2 class="center-align"><a href="/registro/Uniforme">Registrar uniforme</a></h2>
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