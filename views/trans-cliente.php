<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Clientes');
?>
<main>
    <form enctype="multipart/form-data" class="mb-4" id="search-form">
        <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
        <div class="container-fluid">
            <h3 class="card-title">Transacción Clientes</h3>
            <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
            <!-- Inputs -->            
            <div class="row mb-4 fila">
                <!-- Input para el ID -->
                <div class="col-md-2 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="cantidad" name="cantidad" class="form-control validate input-factura" placeholder="Cantidad" required/>
                </div>
                <!-- Input para el ID -->
                <div class="col-md-6 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="precio_venta" name="precio_venta" class="form-control validate input-factura" placeholder="Precio venta" required/>
                </div>
                <div class="col">
                    <button class="btn btn-aceptar mb-4" type="submit">Agregar producto</button>
                </div>
            </div>
        </div>
    </form>
    <form enctype="multipart/form-data" class="mb-4" id="save-form">
        <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
        <div class="container-fluid">
            <h3 class="card-title">Misceláneo</h3>
            <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
            <!-- Inputs -->
            <div class="row mb-4 fila">
                <!-- Este input es invisible solo para darle el id a la factura -->
                <input type="text" name="id_producto" id="id_producto" class="form-control validate input-factura sr-only sr-only-focusable"/>
                <!-- Combobox de Tipo venta -->
                <div class="col-md-6 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="documento_cliente" name="documento_cliente" class="form-control validate input-factura" placeholder="Documento" required/>
                </div> 
                <!-- Combobox de Cliente -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="monto" name="monto" class="form-control validate input-factura" placeholder="Monto" required/>
                </div>               
                <!-- Input para el ID -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="saldo" name="saldo" class="form-control validate input-factura" placeholder="Saldo" required/>
                </div>

                <!-- 
                Input para el Nombre de la factura -->
                <div class="col-md-2 col-sm-6 col-modal-producto mb-4">
                    <select class="browser-default custom-select" name="transaccion" id="transaccion" class="input-factura" data-toggle="tooltip" title="Transacción"></select>
                </div>
                <!-- Input para el Fecha -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <select class="browser-default custom-select" name="responsable_cobro" id="responsable_cobro" class="input-factura" data-toggle="tooltip" title="REsponsable del cobro"></select>
                </div>
                <!-- Input para el DUI -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <select class="browser-default custom-select" name="caja" id="caja" class="input-factura" data-toggle="tooltip" title="Caja"></select>
                </div>
                <!-- Input para el ID -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                <input type="date" id="fecha_factura" name="fecha_factura" class="form-control validate input-factura" placeholder="Fecha" required/>
                </div>
                <!-- Input para el concepto -->
                <div class="col-md-7 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="concepto" name="concepto" class="form-control validate input-factura" placeholder="Concepto" required/>
                </div>
                <!-- Input para la descripción -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="valor" name="valor" class="form-control validate input-factura" placeholder="Valor" required/>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-guardar mb-4" type="submit">Agregar</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container mb-4">
        <!-- Tabla productos -->
        <div class="col-md-12">
            <h3 class="card-title">Tabla de clientes</h3>
            <table id="dtBasicExample" class="table table-sm table-striped text-left table-bordered mb-4" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Venta</th>
                        <th class="th-sm">Codigo</th>
                        <th class="th-sm">Nombre</th>
                        <th class="th-sm">Nombre Comercial</th>
                        <th class="th-sm">Teléfono</th>
                        <th class="th-sm">Dirección</th>
                        <th class="th-sm">Acciones</th>
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
                    <td>lorem ipsum</td>
                    <tr>
                    <th>lorem ipsum</th>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                    <td>lorem ipsum</td>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
    Template::footerTemplate('register.js');
?>