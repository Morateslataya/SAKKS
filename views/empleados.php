<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Empleados');
?>
<main>
    <form enctype="multipart/form-data" class="mb-4" id="save-form">
        <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
        <div class="container-fluid">
            <h1 class="card-title">Empleados</h1>
            <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
            <!-- Inputs -->
            <div class="row mb-4 fila">
                <!-- Este input es invisible solo para darle el id a la factura -->
                <input type="text" name="id_empleados" id="id_empleados" class="form-control validate input-factura sr-only sr-only-focusable"/>
                <!-- Combobox de empleados -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="nombres" name="nombres" class="form-control validate input-factura" placeholder="Nombres" required/>
                </div> 
                <!-- Combobox de tipo plantilla -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="apellidos" name="apellidos" class="form-control validate input-factura" placeholder="Apellidos" required/>
                </div>             
                <!-- Input para el ID -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="email" id="correo" name="correo" class="form-control validate input-factura" placeholder="Correo" required/>
                </div>
                <!-- Input para el Nombre de la factura -->
                <div class="col-md-6 col-sm-12 col-modal-producto mb-4">
                    <input type="password" id="clave" name="clave" class="form-control validate input-factura" placeholder="Clave" required/>
                </div>
                <!-- Input para el Fecha -->
                <div class="col-md-6 col-sm-12 col-modal-producto mb-4">
                    <input type="password" id="confirmar_clave" name="confirmar_clave" class="form-control validate input-factura" placeholder="Confirmar clave" required/>
                </div>
                <!-- Input para el DUI -->
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input type="text" id="dui" name="dui" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="form-control input-factura" required/>
                </div>
                <!-- Input para el Fecha -->
                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                    <input type="date" id="nacimiento" name="nacimiento" class="form-control validate input-factura" placeholder="Fecha Nacimiento" required/>
                </div>
            </div>
            <div class="row mb-4 fila">
                <div class="col">
                    <button class="btn btn-guardar mb-4" type="submit">Guardar</button>
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
                        <th class="th-sm">Apellidos</th>
                        <th class="th-sm">Nombres</th>
                        <th class="th-sm">Correo</th>
                        <th class="th-sm">Dui</th>
                        <th class="actions-column">ACCIÓN</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows">
                </tbody>
            </table>
        </div>
        <div class="col">
            <button class="btn btn-alerta mb-4">Imprimir</button>
        </div>
    </div>
</main>
<?php
    Template::footerTemplate('empleados.js');
?>