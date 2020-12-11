@extends("layouts.principal")

@section("content")
<br><br>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h2 class="center-align">Cotización</h2>
        </div>
    </div>
    <div class="row">
        <div class="col s7 offset-s1">
            <div class="row">
                <div class="col s12">
                <div class="ProductosContenedor">
                    <div class="Productos">
                    <br>
                    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
                    <form action="" class="formProducto" target="dummyframe">
                        <div class="row">
                            <div class="col s8"> <?php $arrayPrecios = array(); ?>
                            <label >Producto</label>
                                <select name="Equipamiento" id="Equipamiento" class="" onchange="actualiza()">
                                        <option value="" disabled selected>Elige una opción</option>
                                        @foreach($equipamiento as $e)
                                        <option id="precioUnit" value="{{$e->idEquipamiento}}" data-precio="{{$e->precio}}" data-nombre="{{$e->nombre}}"> {{$e->nombre}} </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s8">
                                <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                                <label for="descripcion">Descripción</label>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function actualiza(){
                                var e = document.getElementById('Equipamiento');
                                var precio = e.options[e.selectedIndex].dataset.precio;
                                document.getElementById('precioU').value = precio;
                            }
                        </script>
                        <div class="row">
                        <div class="prods">
                            <div class="col s4">
                                <input type="number" name="cantidad" id="cantidad">
                                <label for="cantidad">Cantidad</label>
                            </div>
                            <div class="col s4">
                                <input type="text" name="precioU" id="precioU">
                                <label for="precioU">Precio Unitario</label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col s8">
                                <button onclick="agregaTabla()">Agregar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                    <script type="text/javascript">
                    function agregaTabla(){
                            var e = document.getElementById('Equipamiento');
                            var prodN = e.options[e.selectedIndex].dataset.nombre;
                            var prodP = e.options[e.selectedIndex].dataset.precio;
                            var prodD = document.getElementById('descripcion').value;
                            var prodC = document.getElementById('cantidad').value;
                            var prodT = Number(prodP) * Number(prodC);
                            var t = document.getElementById('tablaProductos').getElementsByTagName('tbody')[0];
                            var row = t.insertRow(0);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);
                            cell1.innerHTML = prodN;
                            cell2.innerHTML = prodD;
                            cell3.innerHTML = prodP;
                            cell4.innerHTML = prodC;
                            cell5.innerHTML = prodT;
                            cell6.innerHTML = "<a href='javascript:;' onclick='eliminaRow(this.parentNode)'> Eliminar </a>";
                        }
                        

                        function eliminaRow(e){
                            var r = e.parentNode;
                            var t = r.parentNode;
                            t.deleteRow(r.rowIndex - 1);
                        }
                    </script>
                </div>
            </div>
        </div>
        <!--Aquí podría ir col s2 con todos los datos de la coti-->
        <div class="col s4">
            <div class="row">
                <div class="col s9">
                    <form action="">
                        <div class="col s4">
                            <input type="text" name="subtotal" id="subtotal" value="0">
                            <label for="subtotal">Subtotal</label>
                        </div>
                        <div class="col s4">
                            <input type="text" name="iva" id="iva" value="0">
                            <label for="iva">IVA 16%</label>
                        </div>
                        <div class="col s4">
                            <input type="text" name="total" id="total" value="0">
                            <label for="total">Total</label>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="row"><a class = "btn" onclick="calcula()">Cotizar</a></div><br><br><br>
            <div class="row">
            <!--
            <a class="btn-floating btn-large waves-effect waves-light" onclick="agregaProducto()"><i class="material-icons">add</i></a>
            -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <table id="tablaProductos">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="productosSum">
                </tbody>
            </table>
            <script type="text/javascript">
                function calcula(){
                    var iva = 0,subt = 0,total = 0;/*
                    //Div que contiene la parte de los productos
                    var prods = document.getElementsByClassName("prods");
                    var cant = 0;
                    var precioU = 0;
                    for(var i = 0 ; i < prods.length; i++){
                        cant = prods[i].children[0].children[0].value;
                        precioU = prods[i].children[1].children[0].value;
                        subt +=  (cant * precioU); 
                        iva += (subt * 16)/100;
                        total += subt + iva;
                    }
                    
                    */
                    var t = document.getElementById("tablaProductos").getElementsByTagName('tbody')[0];
                    for(var i = 0 ; i < t.rows.length ; i++){
                        subt += Number(t.rows[i].getElementsByTagName('td')[4].innerHTML);
                    }
                    iva = (subt*16)/100;
                    total = subt + iva;
                    document.getElementById("iva").value = iva;
                    document.getElementById("subtotal").value = subt;
                    document.getElementById("total").value = total;
                }
            </script>

        </div>
    </div>
    
</div><br><br><br><br><br>

@endsection