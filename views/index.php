<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Login - SAKKS');
?>
    <!-- Este div es para el fondo de imagen -->
    <div class="view landing-page-login" style="background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <!-- Máscara para que los ítems se alinean y dan propiedades de flexbox "Align-items-center" es para obvias razones-->
        <div class="mask align-items-center">
            <!-- Agrego el container -->
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-md-6">
                        <!-- Carta -->
                        <form class="card carta-login" id="session-form">
                            <div class="card-body text-center">
                                <h2 class="card-title mb-4 titulo-login">¡Hola!</h2>
                                <p class="card-text">Ingresa tus datos para iniciar sesión.</p>
                                <!-- Inputs del login -->
                                <div class="md-form">
                                    <input type="email" id="correo" name="correo" class="gray-text form-control input-login" placeholder="Correo" required/>
                                </div>
                                <div class="md-form">
                                    <input type="password" id="clave" name="clave" class="gray-text form-control input-login" placeholder="Contraseña" required/>
                                </div>
                                <button type="submit" class="btn btn-principal btn-md">Iniciar sesión</button>
                            </div>
                            <!-- Card content -->
                        </form>
                    </div>
                    <div class="col-md-6">
                        <!-- Card -->
                        <div class="card carta-invisible">
                            <!-- Card content -->
                            <div class="card-body text-center">
                                <!-- Title -->
                                <h4 class="card-title titulo-login">Bienvenido de vuelta a SAKKS</h4>
                                <!-- Text -->
                                <p class="card-text">Nos alegra tenerte de vuelta.</p>
                            </div>
                            <!-- Card content -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/Contenedor -->
        </div>
        <!--/Máscara -->
    </div>  
<!-- Mando a llamar plantilla del footer -->
<?php
    Template::footerTemplate('log.js');
?>
