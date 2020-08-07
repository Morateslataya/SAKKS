<?php
/*
*	Clase para definir las plantillas de las páginas web del sitio privado.
*/
class Template {
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros: $title (título de la página web y del contenido principal).
    *
    *   Retorno: ninguno.
    */
    public static function headerTemplate($title)
    {
        // Se establece la zona horaria a utilizar durante la ejecución de la página web.
        ini_set('date.timezone', 'America/El_Salvador');
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('
            <!DOCTYPE html>
            <html lang="es" dir="ltr">
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>'.$title.'</title>
                    <!-- Importar el css -->
                    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
                    <link rel="stylesheet" href="../resources/css/mdb.min.css">
                    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
                    <!-- Font Awesome, Para los íconos solamente -->
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
                    <!-- Css propio -->
                    <link rel="stylesheet" href="../resources/css/propio/fonts.css" type="text/css">
                    <link rel="stylesheet" href="../resources/css/propio/login.css" type="text/css">
                </head>
        ');

        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['idempleados'])) {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'index.php' && $filename != 'register.php') {
                // Se llama al método que contiene el código de las cajas de dialogo (modals).
                if($_SESSION['idempleados'] == 1){
                    self::modals();
                    // Se imprime el código HTML para el encabezado del documento con el menú de opciones.
                    print('
                        <body>
                            <!--Navbar -->
                            <nav class="mb-1 navbar navbar-expand-lg navbar-dark sticky-top">
                                <a class="navbar-brand" href="main.php">SAKKS</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">'.$title.'</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Atención al Cliente</a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                            <a class="dropdown-item" href="facturacion.php">Facturación</a>
                                            <a class="dropdown-item" href="clientes.php">Clientes</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="oper-diarias.php">Operaciones Diarias</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="finanzas.php">Finanzas</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recursos humanos</a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                            <a class="dropdown-item" href="plantilla.php">Plantilla</a>
                                            <a class="dropdown-item" href="empleados.php">Empleados</a>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ml-auto nav-flex-icons">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Perfil<i class="fas fa-user"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                            aria-labelledby="navbarDropdownMenuLink-333">
                                            <a class="dropdown-item" href="#">Perfil</a>
                                            <a class="dropdown-item" href="#">Ajustes</a>
                                            <a href="#" onclick="signOff()">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                                </div>
                            </nav>
                            <!--/.Navbar -->
    
                            <header>           
                    ');
                } else {
                    self::modals();
                // Se imprime el código HTML para el encabezado del documento con el menú de opciones.
                print('
                    <body>
                        <!--Navbar -->
                        <nav class="mb-1 navbar navbar-expand-lg navbar-dark sticky-top">
                            <a class="navbar-brand" href="main.php">SAKKS</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">'.$title.'</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Atención al Cliente</a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                        <a class="dropdown-item" href="facturacion.php">Facturación</a>
                                        <a class="dropdown-item" href="clientes.php">Clientes</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="oper-diarias.php">Operaciones Diarias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="finanzas.php">Finanzas</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto nav-flex-icons">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Perfil<i class="fas fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                        aria-labelledby="navbarDropdownMenuLink-333">
                                        <a class="dropdown-item" href="#">Perfil</a>
                                        <a class="dropdown-item" href="#">Ajustes</a>
                                        <a href="#" onclick="signOff()">Salir</a>
                                    </div>
                                </li>
                            </ul>
                            </div>
                        </nav>
                        <!--/.Navbar -->

                        <header>           
                ');
                }
            } else {
                header('location: main.php');
            }
        }else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'index.php' && $filename != 'register.php') {
                header('location: index.php');
            } else {
                // Se imprime el código HTML para el encabezado del documento con un menú vacío cuando sea iniciar sesión o registrar el primer usuario.
                print('
                    <body>
                    <header>
                        <!--Navbar -->
                        <nav class="navbar navbar-expand-lg navbar-dark invisible">
                      
                        </nav>
                        <!--/.Navbar -->  
                ');
            }
        }
    }

    /*
    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public function footerTemplate($controller)
    {
        // Se imprime el código HTML para el pie del documento.
        print('
                </main>
                <!-- Footer -->
                <footer class="page-footer font-small elegant-color fixed-bottom">
                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© 2020 Copyright: AllSportShoes  
                        <a href="../../views/public/" target="_blanck">  Ir a la tienda</a>
                    </div>
                    <!-- Copyright -->
                </footer>
                <!-- Footer -->
                    <!-- jQuery -->
                    <script type="text/javascript" src="../resources/js/jquery.min.js"></script>
                    <!-- Bootstrap tooltips -->
                    <script type="text/javascript" src="../resources/js/popper.min.js"></script>
                    <!-- Bootstrap core JavaScript -->
                    <script type="text/javascript" src="../resources/js/bootstrap.min.js"></script> 
                    <!-- MDB core JavaScript -->
                    <script type="text/javascript" src="../resources/js/mdb.min.js"></script>
                    <!-- Propios scripts -->
                    <script type="text/javascript" src="../resources/js/sweetalert.min.js"></script>
                    <script type="text/javascript" src="../core/helpers/components.js"></script>
                    <script type="text/javascript" src="../core/controllers/account.js"></script>
                    <script type="text/javascript" src="../core/controllers/'.$controller.'"></script>
                    </body>
                </html>
        ');
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals) de editar pefil y cambiar contraseña.
    */
    private function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
            <!-- Componente Modal para mostrar el formulario de editar perfil -->
            <div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <!-- Aquí empieza el contenido del modal -->
                    <div class="modal-content">
                        <!-- Este es el encabezado del modal -->
                        <div class="modal-header text-center">
                            <!-- Título del encabezado -->
                            <h4 class="modal-title w-100 font-weight-bold">Editar perfil</h4>
                            <!-- Boton para cerrar el modal -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Aquí empieza el cuerpo del modal -->
                        <div class="modal-body">
                            <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
                            <form class="container-fluid" id="profile-form">
                                <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
                                <div class="row">
                                    <!-- Inputs -->
                                    <!-- Input para el nombre -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="text" id="nombres_perfil" name="nombres_perfil" class="form-control validate input-login-p" placeholder="Nombre" required/>
                                    </div>
                                    <!-- Input para los apellidos -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="text" id="apellidos_perfil" name="apellidos_perfil" class="form-control validate input-login-p" placeholder="Apellidos" required/>
                                    </div>
                                    <!-- Input para el mail -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="email" id="correo_perfil" name="correo_perfil" class="form-control validate input-login-p" placeholder="Correo" required/>
                                    </div>
                                    <!-- Input para el ussuario -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="text" id="usuario_perfil" name="usuario_perfil" class="form-control validate input-login-p" placeholder="Usuario" required/>
                                    </div>
                                </div>
                                <!-- Este es el pie del modal -->
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn boton" type="submit">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Componente Modal para mostrar el formulario de cambiar contraseña -->
            <div class="modal fade" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" >
                    <!-- Aquí empieza el contenido del modal -->
                    <div class="modal-content">
                        <!-- Este es el encabezado del modal -->
                        <div class="modal-header text-center">
                            <!-- Título del encabezado -->
                            <h4 class="modal-title w-100 font-weight-bold">Cambiar contraseña</h4>
                            <!-- Boton para cerrar el modal -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Aquí empieza el cuerpo del modal -->
                        <div class="modal-body">
                            <div class="row center-align">
                                <label>CLAVE ACTUAL</label>
                            </div>
                            <!-- Lo maqueto con "container-fluid" para que el modal pueda hacerce más grande según le coloquemos -->
                            <form class="container-fluid" id="password-form">
                                <!-- Se maqueta con "row" > "col" para que se puedan poner varios en una sola fila -->
                                <div class="row">
                                    <!-- Inputs -->
                                    <!-- Input para el nombre -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="password" id="clave_actual_1" name="clave_actual_1" class="form-control validate input-login-p" placeholder="Contraseña actual" required/>
                                    </div>
                                    <!-- Input para los apellidos -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="password" id="clave_actual_2" name="clave_actual_2" class="form-control validate input-login-p" placeholder="Repita contraseña" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Inputs -->
                                    <!-- Inputs para la clave nueva -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="password" id="clave_nueva_1" name="clave_nueva_1" class="form-control validate input-login-p" placeholder="Contraseña nueva" required/>
                                    </div>
                                    <!-- Input para los apellidos -->
                                    <div class="col-md-6 col-sm-12 col-modal-producto">
                                        <input type="password" id="clave_nueva_2" name="clave_nueva_2" class="form-control validate input-login-p" placeholder="Contraseña nueva" required/>
                                    </div>
                                </div>
                                <!-- Este es el pie del modal -->
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn boton" type="submit">Aceptar</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        ');
    }

} 
?>