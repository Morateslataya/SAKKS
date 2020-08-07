<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Plantilla');
?>
<main>
    <form enctype="multipart/form-data" class="mb-4" id="save-form">
        <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
        <div class="container-fluid">
            <h1 class="card-title">Plantilla</h1>
            <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
            <!-- Inputs -->
            <div class="row mb-4 fila">
                <!-- Este input es invisible solo para darle el id a la factura -->
                <input type="text" name="id_plantilla" id="id_plantilla" class="form-control validate input-factura sr-only sr-only-focusable"/>
                <!-- Combobox de empleados -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <select class="browser-default custom-select" name="empleado_plantilla" id="empleado_plantilla" class="input-factura" data-toggle="tooltip" title="Empleado"></select>
                </div> 
                <!-- Combobox de tipo plantilla -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <select class="browser-default custom-select" name="tipo_plantilla" id="tipo_plantilla" class="input-factura" data-toggle="tooltip" title="Tipo plantilla"></select>
                </div>               
                <!-- Input para el ID -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control validate input-factura" placeholder="Fecha Ingreso" required/>
                </div>
                <!-- Input para el Nombre de la factura -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="date" id="fecha_calculo" name="fecha_calculo" class="form-control validate input-factura" placeholder="Fecha Calculo" required/>
                </div>
                <!-- Input para el Fecha -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="aguinaldo_paga" name="aguinaldo_paga" class="form-control validate input-factura" placeholder="Aguinaldo" required/>
                </div>
                <!-- Input para el DUI -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="salario" name="salario" class="form-control validate input-factura" placeholder="Salario" required/>
                </div>
            </div>
            <div class="row mb-4 fila">
                <div class="col">
                    <button class="btn btn-guardar mb-4" type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</main>
<?php
    Template::footerTemplate('register.js');
?>