<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Att. al cliente');
?>
<main>
    <form enctype="multipart/form-data" class="mb-4" id="save-form">
        <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
        <div class="container-fluid">
            <h1 class="card-title">Facturación</h1>
            <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
            <!-- Inputs -->
            <div class="row mb-4 fila">
                <!-- Este input es invisible solo para darle el id a la factura -->
                <input type="text" name="id_producto" id="id_producto" class="form-control validate input-factura sr-only sr-only-focusable"/>
                <!-- Combobox de Tipo venta -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <select class="browser-default custom-select" name="tipo_venta" id="tipo_venta" class="input-factura" data-toggle="tooltip" title="Tipo de venta"></select>
                </div> 
                <!-- Combobox de Cliente -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <select class="browser-default custom-select" name="cliente_factura" id="cliente_factura" class="input-factura" data-toggle="tooltip" title="Cliente"></select>
                </div>               
                <!-- Input para el ID -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="id" name="id" class="form-control validate input-factura" placeholder="ID" required/>
                </div>
                <!-- Input para el Nombre de la factura -->
                <div class="col-md-5 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="nombre_factura" name="nombre_factura" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,30}" class="form-control validate input-factura" placeholder="Nombre" required/>
                </div>
                <!-- Input para el Fecha -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="date" id="fecha_factura" name="fecha_factura" class="form-control validate input-factura" placeholder="Fecha" required/>
                </div>
                <!-- Input para el DUI -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="dui" name="dui" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="form-control input-factura" required/>
                </div>
                <!-- Input para el ID -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="id_d" name="id_d" class="form-control validate input-factura" placeholder="ID" required/>
                </div>
                <!-- Input para la descripción -->
                <div class="col-md-6 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="descripcion_factura" name="descripcion_factura" class="form-control validate input-factura" placeholder="Descripción" required/>
                </div>
            </div>
            <div class="row mb-4 fila">
                <!-- Input para el ID -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="cantidad" name="cantidad" class="form-control validate input-factura" placeholder="Cantidad" required/>
                </div>
                <!-- Input para el ID -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="precio_venta" name="precio_venta" class="form-control validate input-factura" placeholder="Precio venta" required/>
                </div>
                <!-- Input para el ID -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="descuento" name="descuento" class="form-control validate input-factura" placeholder="descuento" required/>
                </div>
                <div class="col">
                    <button class="btn btn-guardar mb-4" type="submit">Facturar</button>
                    <a class="btn btn-aceptar mb-4" href="">Agregar producto</a>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <!-- Tabla productos -->
        <div class="col-md-12">
            <table id="dtBasicExample" class="table table-sm table-striped text-left table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Venta</th>
                        <th class="th-sm">Codigo</th>
                        <th class="th-sm">Usuario</th>
                        <th class="th-sm">Lote</th>
                        <th class="th-sm">Estado</th>
                        <th class="th-sm">Acción</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows">
                    <tr>
                    <th>lorem ipsum</th>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <tr>
                    <th>lorem ipsum</th>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                </tbody>
            </table>
        </div>
        <div class="col">
            <button class="btn btn-alerta mb-4">Imprimir</button>
        </div>
    </div>
</main>
<!-- Mando a llamar plantilla del footer -->
<?php
    Template::footerTemplate('facturacion.js');
?>
