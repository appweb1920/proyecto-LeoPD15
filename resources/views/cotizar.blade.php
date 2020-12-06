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
        <div class="col s10 offset-s2">
            <div class="row">
                <div class="col s12">
                    <form action="">
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
                            <div class="col s8">
                                <input type="number" name="cantidad" id="cantidad">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="precioU" id="precioU">
                                <label for="precioU">Precio Unitario</label>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
@endsection