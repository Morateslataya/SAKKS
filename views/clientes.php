<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Clientes');
?>
<main>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <!-- Pongo un form para que el boton no se vaya abajo y se mantenga a un lado -->
            <form class="form-inline md-form mr-auto mb-4" id="search-form">
                <!-- Input para buscar -->
                <input class="form-control input-login-p" type="text" placeholder="Buscar" name="search" id="search">
                <!-- Boton para buscar -->
                <button class="btn boton btn-sm my-0" type="submit">Buscar</button>
            </form>
        </div>
        <!-- Col de botones -->
        <div class="col-md-6 col-sm-12">
            <!-- Botón para agregar producto -->
            <a href="#" class="btn btn-guardar mb-4" onclick="openCreateModal()"><i class="fas fa-plus-circle"></i> Agregar Cliente</a>
            <!-- Botón para imprimir un reporte -->
            <a href="../../core/reports/dashboard/productos.php" target="_blank"  class="btn boton mb-4"><i class="fas fa-file-pdf"></i> Exportar reporte pdf</a>
        </div>
    </div>
    <!-- Contenedor para la tabla de los clientes -->
    <div class="container-fluid">
        <!-- Fila productos -->
            <!-- Pongo un form para que el boton no se vaya abajo y se mantenga a un lado -->
            <form class="form-inline md-form mr-auto mb-4" id="search-form">
                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                    <input class="form-control input-login-p" type="text" placeholder="Buscar" name="search">
                </div>
                <a class="btn btn-negro mb-4" href="trans-cliente.php">Transacc. Cliente</a>
                <button class="btn btn-aceptar btn-sm my-0" type="submit">Buscar</button>
            </form>
        <div class="col-md-12">
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
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal para agregar producto -->
    <div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" id="modal-productos">
            <!-- Aquí empieza el contenido del modal -->
            <div class="modal-content">
                <!-- Este es el encabezado del modal -->
                <div class="modal-header text-center">
                    <!-- Título del encabezado -->
                    <h4 class="modal-title w-100 font-weight-bold" id="modal-title"></h4>
                    <!-- Boton para cerrar el modal -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="save-form">
                    <!-- Aquí empieza el cuerpo del modal -->
                    <div class="modal-body">
                        <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
                        <div class="container-fluid">
                            <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
                            <div class="row">
                                <!-- Este input es invisible solo para darle el id a los lientes -->
                                <input type="text" name="id_cliente" id="id_cliente" class="form-control validate input-factura sr-only sr-only-focusable"/>

                                <!-- Input para los nombres -->
                                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="nombre_cliente" name="nombre_cliente" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="form-control validate input-factura" placeholder="Nombres" required/>
                                </div>              
                                <!-- Input para los apellidos -->
                                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="apelidos_cliente" name="apellidos_cliente" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="form-control validate input-factura" placeholder="Apellidos" required/>
                                </div>
                                <!-- Input para el nombre comercial -->
                                <div class="col-md-4 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="nombre_comercial" name="nombre_comercial" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="form-control validate input-factura" placeholder="Nombre comercial" required/>
                                </div>

                                <!-- Input para la dirección -->
                                <div class="col-md-6 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="direccion_cliente" name="direccion_cliente" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,70}" class="form-control validate input-factura" placeholder="Dirección" required/>
                                </div>
                                <!-- Input para el departamento -->
                                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="departamento" name="departamento" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,15}" class="form-control validate input-factura" placeholder="Departamento" required/>
                                </div>
                                <!-- Input para el municipio -->
                                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="municipio" name="municipio" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,15}" class="form-control validate input-factura" placeholder="Municipio" required/>
                                </div>

                                <!-- Input para el telefono -->
                                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="telefono_cliente" name="telefono_cliente" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" class="form-control validate input-factura" placeholder="Teléfono" required/>
                                </div>
                                <!-- Input para el DUI -->
                                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                                    <input type="text"  id="dui" name="dui" placeholder="DUI" pattern="[0-9]{8}[-][0-9]{1}" class="form-control validate input-factura" placeholder="DUI" required/>
                                </div>
                                <!-- Input para el NIT -->
                                <div class="col-md-3 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="nit" name="nit" pattern="[0-9]{4}[-][0,1,2,3]{1}[0-9]{5}[-][0-9]{3}[-][0-9]{1}" class="form-control validate input-factura" placeholder="NIT" required/>
                                </div>
                                <!-- Input para el correo -->
                                <div class="col-md-6 col-sm-6 col-modal-producto mb-4">
                                    <input type="email" id="correo" name="correo" class="form-control validate input-factura" placeholder="Correo" required/>
                                </div>
                                <!-- Input para la actividad -->
                                <div class="col-md-6 col-sm-6 col-modal-producto mb-4">
                                    <input type="text" id="actividad" name="actividad" placeholder="Actividad" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,70}" class="form-control input-factura" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Este es el pie del modal -->
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-guardar mb-4" type="submit">Agregar cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Aquí termina el modal -->
</main>

<?php
    Template::footerTemplate('clientes.js');
?>