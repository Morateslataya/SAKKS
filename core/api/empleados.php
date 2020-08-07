<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/empleados.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $empleados = new Empleados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['idempleados'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'readAll':
                if ($empleados->readAll()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
            case 'create':
                $_POST = $empleados->validateForm($_POST);
                    if ($empleados->setNombres($_POST['nombres'])) {
                        if ($empleados->setApellidos($_POST['apellidos'])) {
                            if ($empleados->setCorreo($_POST['correo'])) {
                                if ($empleados->setDUI($_POST['dui'])) {
                                    if ($empleados->setNacimiento($_POST['nacimiento'])) {
                                            if ($_POST['clave'] == $_POST['confirmar_clave']) {
                                                if ($empleados->setClave($_POST['clave'])) {
                                                    if ($empleados->createRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'empleado registrado correctamente';
                                                    } else {
                                                        print_r($_POST);
                                                        $result['exception'] = 'Ocurrió un problema al registrar el empleado';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Clave menor a 6 caracteres';
                                                }
                                            } else {
                                                $result['exception'] = 'Claves diferentes';
                                            }
                                    } else {
                                        $result['exception'] = 'Fecha de nacimiento incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'DUI incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }    
                break;
            default:
                exit('Acción no disponible dentro de la sesión');
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($empleados->readAll()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
            case 'register':
                $_POST = $empleados->validateForm($_POST);
                    if ($empleados->setNombres($_POST['nombres'])) {
                        if ($empleados->setApellidos($_POST['apellidos'])) {
                            if ($empleados->setCorreo($_POST['correo'])) {
                                if ($empleados->setDUI($_POST['dui'])) {
                                    if ($empleados->setNacimiento($_POST['nacimiento'])) {
                                            if ($_POST['clave'] == $_POST['confirmar_clave']) {
                                                if ($empleados->setClave($_POST['clave'])) {
                                                    if ($empleados->createRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'empleado registrado correctamente';
                                                    } else {
                                                        print_r($_POST);
                                                        $result['exception'] = 'Ocurrió un problema al registrar el empleado';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Clave menor a 6 caracteres';
                                                }
                                            } else {
                                                $result['exception'] = 'Claves diferentes';
                                            }
                                    } else {
                                        $result['exception'] = 'Fecha de nacimiento incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'DUI incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                break;
                case 'login':
                    $_POST = $empleados->validateForm($_POST);
                    if ($empleados->checkUser($_POST['correo'])) {
                            if ($empleados->checkPassword($_POST['clave'])) {
                                $_SESSION['idempleados'] = $empleados->getId();
                                $_SESSION['correo'] = $empleados->getCorreo();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                            } else {
                                $result['exception'] = 'Clave incorrecta';
                            }
                        }
                     else {
                        $result['exception'] = 'Alias incorrecto';
                    }
                    break;
                default:
                    exit('Acción no disponible fuera de la sesión');
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
