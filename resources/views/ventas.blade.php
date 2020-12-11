@extends('layouts.principal')

@section('content')

@if(!is_null(Auth::user()))
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="row"><h3>Registro de Ventas</h3></div>
            @if(!is_null($ventasUniformes) || !is_null($ventasEquipamiento))
            <div class="row">
                <h5>Ventas Uniformes</h5>
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Uniforme</th>
                                <th>Talla</th>
                                <th>Cantidad</th>
                                <th>Dia</th>
                            </tr>
                        </thead>
                        @foreach($ventasUniformes as $vU)
                            <tr>
                                <th>{{$vU->escuela}}</th>
                                <th>{{$vU->talla}}</th>
                                <th>{{$vU->vendido}}</th>
                                <th>{{$vU->dia}}</th>
                            </tr>
                        @endforeach
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <h5>Ventas Equipamiento</h5>
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Equipamiento</th>
                                <th>Talla</th>
                                <th>Cantidad</th>
                                <th>Dia</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($ventasEquipamiento as $vE)
                            <tr>
                                <th>{{$vE->nombre}}</th>
                                <th>{{$vE->talla}}</th>
                                <th>{{$vE->vendido}}</th>
                                <th>{{$vE->dia}}</th>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
            @else

            @endif
        </div>  
    </div>
</div>
@else
<meta http-equiv="refresh" content="0; URL=/loginLU"/>
@endif


@endsection