
// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_EMPLEADOS = '../core/api/empleados.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_EMPLEADOS );
    // Se declara e inicializa un objeto para obtener la fecha y hora actual.
    let today = new Date();
    // Se declara e inicializa una variable para guardar el día en formato de 2 dígitos.
    let day = ( '0' + today.getDate() ).slice( -2 );
    // Se declara e inicializa una variable para guardar el mes en formato de 2 dígitos.
    var month = ( '0' + ( today.getMonth() + 1 ) ).slice( -2 );
    // Se declara e inicializa una variable para guardar el año con la mayoría de edad.
    let year = today.getFullYear() - 18;
    // Se declara e inicializa una variable para establecer el formato de la fecha.
    let date = (`${year}-${month}-${day}`);
    // Se asigna la fecha como valor máximo en el campo del formulario.
    $( '#nacimiento' ).prop( 'max', date );
});

// Función para llenar la tabla con los datos de los registros.
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.apellidos}</td>
                <td>${row.nombres}</td>
                <td>${row.correo}</td>
                <td>${row.dui}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.idempleados})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.idempleados})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $( '.tooltipped' ).tooltip();
}

// Evento para mostrar los resultados de una búsqueda.
$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_EMPLEADOS, this );
});


// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar usuario' );
    // Se deshabilitan los campos de alias y contraseña.
    $( '#clave_usuario' ).prop( 'disabled', true );
    $( '#confirmar_clave' ).prop( 'disabled', true );
    $( '#alias_usuario' ).prop( 'disabled', true );

    $.ajax({
        dataType: 'json',
        url: API_EMPLEADOS + 'readOne',
        data: { idempleados: id },
        type: 'post'
    })
    .done(function( response ){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#idempleado' ).val( response.dataset.idempleados );
            $( '#nombres' ).val( response.dataset.nombres );
            $( '#apellidos' ).val( response.dataset.apellidos );
            $( '#correo' ).val( response.dataset.correo );
            $( '#dui' ).val( response.dataset.dui );
            $( '#nacimiento' ).val( response.dataset.nacimiento );
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            M.updateTextFields(); 
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
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_usuario' ).val() ) {
        saveRow( API_USUARIOS, 'update', this, 'save-modal' );
    } else {
        saveRow( API_EMPLEADOS, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo para confirmar.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_usuario: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_EMPLEADOS, identifier );
}