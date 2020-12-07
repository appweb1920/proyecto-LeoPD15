@extends("layouts.principal")

@section("content")
<br><br>
<div >
    <div class="row">
        <div class="col s12">
            <h2 class="center-align">Cotización</h2>
            <p class="center-align"><b>Nota, agregar con el botón + los productos que se deseen antes de darle al botón</b></p>  
        </div>
    </div>
    <div class="row">
        <div class="col s7 offset-s1">
            <div class="row">
                <div class="col s12">
                <div class="ProductosContenedor">
                <div class="Productos">
                    <br>
                    <form action="" class="formProducto">
                        <div class="row">
                            <div class="col s8">
                                <input type="text" name="producto" id="producto">
                                <label for="producto">Producto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s8">
                                <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                                <label for="descripcion">Descripción</label>
                            </div>
                        </div>
                        <div class="row">
                        <div class="prods">
                            <div class="col s4">
                                <input type="number" name="cantidad" id="cantidad">
                                <label for="cantidad">Cantidad</label>
                            </div>
                            <div class="col s4">
                                <input type="number" name="precioU" id="precioU">
                                <label for="precioU">Precio Unitario</label>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                    </div>
                    
                    <script type="text/javascript">
                        function calcula(){
                            var iva = 0;
                            var subt = 0;
                            var total = 0;
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
                            document.getElementById("iva").value = iva;
                            document.getElementById("subtotal").value = subt;
                            document.getElementById("total").value = total;
                        }
                        function agregaProducto(){
                            var e=document.getElementsByClassName("ProductosContenedor")[0];
                            var f = document.getElementsByClassName("Productos")[0].innerHTML;
                            e.innerHTML += f;
                        }
                    </script>
                </div>
            </div>
            <div class="row">
            <a class="btn-floating btn-large waves-effect waves-light" onclick="agregaProducto()"><i class="material-icons">add</i></a>
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
            <div class="row"><a class = "btn" onclick="calcula()">Cotizar</a></div>
        </div>
    </div>
    
    <!--<div class="row">
        <div class="col s10 offset-s2">
        
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
        </div>
    </div>
    -->
</div>
<br>
<br>
<br>
<br>
<br>
@endsection