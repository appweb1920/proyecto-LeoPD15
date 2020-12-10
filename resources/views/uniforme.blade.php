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
                        <div class="col s2 offset-s5"><a href="/Uniforme/editar/{{$uniforme->idUniforme}}"><h5>Editar</h5></a></div>
                    </div>
                </div> <?php $talla = " "; ?>
                <div class="col s7 offset-s1" >
                    <div class="col s5">
                        <div class="row">
                        <script type="text/javascript">
                            function actualiza(){
                                var e = document.getElementById("idTalla");
                                //Obtener el valor (idTalla) de la talla seleccionada
                                var idTalla = e.options[e.selectedIndex].value;
                                //Obtener el valor en numero de la talla seleccionada
                                var talla = e.options[e.selectedIndex].text;
                                //Cambiar el valor del idTalla para registrarlo en la venta
                                var idtallaVenta = document.getElementById('idTallaVenta');
                                var tallaVenta = document.getElementById('tallaVenta');
                                //Actualizar los campos para el registro de la venta
                                idtallaVenta.value = idTalla;
                                tallaVenta.value = talla;
                            }
                        </script>
                            <div>
                                @if(!is_null($tallas))
                                
                                <div class="input-field col s12">
                                    <select name="idTalla" id="idTalla" onchange="actualiza()">
                                    
                                            <option value="" disabled selected>Elige una talla</option>
                                        @foreach($tallas as $t)
                                            <option value="{{$t->idTalla}}">{{$t->talla}}</option>
                                        @endforeach
                                    </select>
                                <label>Talla</label>
                                @error('idVentaTalla')
                                    <p style="background-color:#E57373">{{ $message }}</p>
                                @enderror
                                </div>
                                @else
                                <h5>No hay tallas disponibles</h5>
                                @endif
                            </div>
                        </div><br>
                        <div class="row">
                            <div><input type="text" name="disponible" id="disponible"><label for="disponible">Disponible</label></div>
                        </div><br>
                        <div class="row">
                            <div><input type="text" name="precio" id="precio"><label for="precio">Precio</label></div>
                        </div><br>
                    </div>
                    <div class="col s6 offset-s1">
                    <div class="row">
                        <div class="col s10" >
                            <div class="row"><h5>Vender</h5></div>
                            <form action="/Venta/Uniforme" method="POST">
                            @csrf
                                <input type="hidden" name="idTallaVenta" id="idTallaVenta" class="validate">
                                <input type="hidden" name="idVentaUniforme" id="idVentaUniforme" value="{{$uniforme->idUniforme}}">
                                <input type="hidden" name="tallaVenta" id="tallaVenta" class="validate">
                                <div class="row" >
                                    <div class="input-field col s8">
                                        <input type="number" name="vendido" id="vendido" min="0" class="validate">
                                        <label for="vendido">Cantidad de venta:</label>
                                        @error('cantidad')
                                            <p style="background-color:#E57373">{{ $message }}</p>
                                        @enderror
                                    </div>
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
            @endif
        </div>
    </div>
    <div class="row">
        <h3>Ventas</h3>
        <div class="col s8 offset-s2" >
            @if(!is_null($ventas))
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Talla</th>
                            <th>Cantidad vendida</th>
                        </tr>
                        <tbody>
                            @foreach($ventas as $v)
                            <tr>
                                <th>{{ $v->dia }}</th>
                                <th>{{ $v->talla }}</th>
                                <th>{{ $v->vendido }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            @else
                <h5>Aún no hay ventas registradas</h5>
            @endif
        </div>
    </div>
</div>
<br>
<br>
<br>

@endsection