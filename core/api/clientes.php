<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['idempleados'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        // Se comparan las acciones
        switch ($_GET['action']) {
            // Acción leer todos los registros (para la tabla)
            case 'readAll':
                if ($result['dataset'] = $cliente->readAll()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay clientes registrados';
                }
                break;
            // Acción buscar un registro específico
            case 'search':
                $_POST = $cliente->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $cliente->searchRows($_POST['search'])) {
                        $result['status'] = 1;
						$rows = count($result['dataset']);
						if ($rows > 1) {
							$result['message'] = 'Se encontraron '.$rows.' clientes';
						} else {
							$result['message'] = 'Solo existe un cliente con esas características';
						}
                    } else {
                        $result['exception'] = 'No se encontraron clientes';
                    }
                } else {
                    $result['exception'] = 'Escriba algo para buscar';
                }
                break;
            // Insertar cliente
            case 'create':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setNombres($_POST['nombre_cliente'])) {
                    if ($cliente->setApellidos($_POST['apellidos_cliente'])) {
                        if ($cliente->setNComercial($_POST['nombre_comercial'])) {
                            if ($cliente->setDireccion($_POST['direccion_cliente'])) {
                                if ($cliente->setDepartamento($_POST['departamento'])) {
                                    if ($cliente->setMunicipio($_POST['municipio'])) {
                                        if ($cliente->setTelefono($_POST['telefono_cliente'])) {
                                            if ($cliente->setDUI($_POST['dui'])) {
                                                if ($cliente->setActividad($_POST['actividad'])) {
                                                    if ($cliente->setNIT($_POST['nit'])) {
                                                        if ($cliente->setCorreo($_POST['correo'])) {
                                                            if ($cliente->createRow()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Se registro el cliente';
                                                            } else {
                                                                $result['exception'] = Database::getException();;
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Actividad incorrecta';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Actividad incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Actividad incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Formato de DUI incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Municipio incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Departamento incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Dirección incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Número de existencia incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            // Leer un producto
            case 'readOne':
                if ($cliente->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $cliente->readOne()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'El cliente no existe';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'update':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setId($_POST['id_cliente'])) {
                    if ($cliente->setNombres($_POST['nombre_cliente'])) {
                        if ($cliente->setApellidos($_POST['apellidos_cliente'])) {
                            if ($cliente->setNComercial($_POST['nombre_comercial'])) {
                                if ($cliente->setDireccion($_POST['direccion_cliente'])) {
                                    if ($cliente->setDepartamento($_POST['departamento'])) {
                                        if ($cliente->setMunicipio($_POST['municipio'])) {
                                            if ($cliente->setTelefono($_POST['telefono_cliente'])) {
                                                if ($cliente->setDUI($_POST['dui'])) {
                                                    if ($cliente->setActividad($_POST['actividad'])) {
                                                        if ($cliente->setNIT($_POST['nit'])) {
                                                            if ($cliente->setCorreo($_POST['correo'])) {
                                                                if ($cliente->updateRow()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Se actualizó el cliente';
                                                                } else {
                                                                    $result['exception'] = Database::getException();;
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Actividad incorrecta';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Actividad incorrecta';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Actividad incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Formato de DUI incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Teléfono incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Municipio incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Departamento incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Dirección incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Número de existencia incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'delete':
                if ($cliente->setId($_POST['id_cliente'])) {
                    if ($data = $cliente->readOne()) {
                        if ($cliente->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cliente eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
	exit('Recurso denegado');
}
?>
