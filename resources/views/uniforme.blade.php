@extends ('layouts.principal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
        <h3>Uniforme</h3><br><br>
            @if(isset($uniforme))
            <div class="row">
                <div class="col s4" >
                    <div class="row center-align"><h5>{{$escuela->nombre}} - {{$escuela->grado}} - {{$uniforme->genero}}</h5>
                    <img class="imagen" src="{{ asset('/storage/uniformes/'.$uniforme->foto) }}" alt="{{ asset('/storage/logo.jpg') }}"></div>
                    <div class="row">
                        
                        <div class="col s2 offset-s5"><a href="/uniforme/tallas/{{$uniforme->idUniforme}}"><h5>Tallas</h5></a></div>
                        <div class="col s2 offset-s5"><a href=""><h5>Editar</h5></a></div>
                    </div>
                </div>
                <div class="col s6 offset-s1">
                    <div class="row">
                        <div><h5>Talla: {{ $uniforme->talla }}</h5></div>
                    </div><br>
                    <div class="row">
                        <div><h5>Disponibles: {{ $uniforme->cantidad }}</h5></div>
                    </div><br>
                    <div class="row">
                        <div><h5>Precio: ${{ $uniforme->precio }}</h5></div>
                    </div><br>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <h3>Venta</h3>
    </div>
</div>
<br>
<br>
<br>

@endsection