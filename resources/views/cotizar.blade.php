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
                            <div class="col s8">
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
                        function agregaTabla(){ //Función para agregar los datos del producto a la tabla de cotizaciones
                            var e = document.getElementById('Equipamiento');
                            var prodN = e.options[e.selectedIndex].dataset.nombre; //Nombre del producto
                            var prodP = e.options[e.selectedIndex].dataset.precio;//Precio del producto
                            var prodD = document.getElementById('descripcion').value;//Descripción del producto
                            var prodC = document.getElementById('cantidad').value;//Cantidad a vender del producto
                            var prodT = Number(prodP) * Number(prodC);//Total de la venta del producto
                            //Obtención de la tabla para proceder a registrar el producto
                            var t = document.getElementById('tablaProductos').getElementsByTagName('tbody')[0];
                            var row = t.insertRow(0);//Inserción nueva fila
                            //Creación de las columnas necesarias
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);
                            //Se de la el valor a cada columna con los detalles del producto, se incluye una opción para eliminar la fila
                            cell1.innerHTML = prodN;
                            cell2.innerHTML = prodD;
                            cell3.innerHTML = prodP;
                            cell4.innerHTML = prodC;
                            cell5.innerHTML = prodT;
                            cell6.innerHTML = "<a href='javascript:;' onclick='eliminaRow(this.parentNode)'> Eliminar </a>";
                        }
                        function eliminaRow(e){  //Función para eliminar una fila o un producto de la tabla de cotización
                            var r = e.parentNode;//Se obtiene la fila a eliminar para usar su índice
                            var t = r.parentNode;//Se obtiene la tabla a la cual corresponde la fila a eliminar
                            t.deleteRow(r.rowIndex - 1);//Se elimina la fila
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
                            <input type="text" name="subtotal" id="subtotal" value="0" disabled>
                            <label for="subtotal">Subtotal</label>
                        </div>
                        <div class="col s4">
                            <input type="text" name="iva" id="iva" value="0" disabled>
                            <label for="iva">IVA 16%</label>
                        </div>
                        <div class="col s4">
                            <input type="text" name="total" id="total" value="0" disabled> 
                            <label for="total">Total</label>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="row"><a class = "btn" onclick="calcula()">Cotizar</a></div><br><br><br>
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
                    //Variables necesarias para la cotización
                    var iva = 0,subt = 0,total = 0;
                    //Obtención de la tabla con los detalles de los productos para la cotización
                    var t = document.getElementById("tablaProductos").getElementsByTagName('tbody')[0];
                    //Cálculo del subtotal, sumando los totales de cada producto
                    for(var i = 0 ; i < t.rows.length ; i++){
                        subt += Number(t.rows[i].getElementsByTagName('td')[4].innerHTML);
                    }
                    //Cálculo del IVA
                    iva = (subt*16)/100;
                    //Cálculo del Total
                    total = subt + iva;
                    //Mostrar en pantalla las cantidades
                    document.getElementById("iva").value = iva;
                    document.getElementById("subtotal").value = subt;
                    document.getElementById("total").value = total;
                }
            </script>
        </div>
    </div>

@endsection