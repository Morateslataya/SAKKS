// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../core/api/clientes.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_CLIENTES );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombres}</td>
                <td>${row.apellidos}</td>
                <td>${row.nombrecomercial}</td>
                <td>${row.municipio}</td>
                <td>${row.telefono}</td>
                <td>${row.dui}</td>
                <td>${row.correo}</td>
                <td>${row.nit}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.idcliente})" class="btn btn-editar"><i class="fas fa-pen"></i></a>
                    <a href="#" onclick="openDeleteDialog(${row.idcliente})" class="btn btn-eliminar"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
}

// Evento para mostrar los resultados de una búsqueda.
$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_CLIENTES, this );
});

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    console.log('Crear cliente');
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Crear cliente' );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    console.log('actualizamos');
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar cliente' );

    $.ajax({
        dataType: 'json',
        url: API_CLIENTES + 'readOne',
        data: { id_cliente: id },
        type: 'post'
    })
    .done(function( response ){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_cliente' ).val( response.dataset.idcliente );
            $( '#nombre_cliente' ).val( response.dataset.nombres );
            $( '#apelidos_cliente' ).val( response.dataset.apellidos );
            $( '#nombre_comercial' ).val( response.dataset.nombrecomercial );
            $( '#direccion_cliente' ).val( response.dataset.direccion );
            $( '#departamento' ).val( response.dataset.departamento );
            $( '#municipio' ).val( response.dataset.municipio );
            $( '#telefono_cliente' ).val( response.dataset.telefono );
            $( '#dui' ).val( response.dataset.dui );
            $( '#nit' ).val( response.dataset.nit );
            $( '#correo' ).val( response.dataset.correo );
            $( '#actividad' ).val( response.dataset.actividad );
        } else {
            sweetAlert( 2, result.exception, null );
        }
    })
    .fail(function( jqXHR ){
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Evento para crear o modificar un registro.
$( '#save-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_cliente' ).val() ) {
        saveRow( API_CLIENTES, 'update', this, 'save-modal' );
    } else {
        saveRow( API_CLIENTES, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_cliente: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_CLIENTES, identifier );
}
