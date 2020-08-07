<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Registra primer usuario - SAKKS');
?>
    <!-- Este div es para el fondo de imagen -->
    <div class="view landing-page-login" style="background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <!-- Máscara para que los ítems se alinean y dan propiedades de flexbox "Align-items-center" es para obvias razones-->
        <div class="mask align-items-center">
            <!-- Div contenedor del formulario -->
        <div class="container" id="contenedor-login">
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <!-- Tarjeta donde colocamos el formulario -->
                    <div class="card text-center">
                        <!-- Formulario para registrarse -->
                        <form class="text-center p-5" id="register-form">
                            <p class="h4 mb-4">Iniciar sesión</p>
                            <!-- Fila de inputs de nombres -->
                            <div class="form-row mb-4">
                                <div class="col">
                                    <!-- Nombres -->
                                    <input type="text" id="nombres" name="nombres" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,30}" class="form-control validate" placeholder="Nombres" required/>
                                </div>
                                <div class="col">
                                    <!-- Apellidos -->
                                    <input type="text" id="apellidos" name="apellidos" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,30}" class="form-control validate" placeholder="Apellidos" required/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <!-- Correo -->
                                    <input type="email" id="correo" name="correo" maxlength="50" class="form-control mb-4 validate" placeholder="Correo" required/>
                                </div>
                                <div class="col">
                                    <!-- DUI -->
                                    <input type="text" id="dui" name="dui" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="form-control mb-4 validate" required/>
                                </div>
                            </div>
                            <!-- Telefono y fecha de nacimiento -->
                            <div class="form-row mb-4">
                                <div class="col">
                                    <input type="date" id="nacimiento" name="nacimiento" class="form-control validate" >
                                </div>
                            </div> 
                            <!-- Contraseña -->
                            <div class="form-row mb-4">
                                <div class="col">
                                    <!-- Primer input para la contraseña -->
                                    <input type="password" id="clave" name="clave" class="form-control validate" placeholder="Contraseña"  required/>
                                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                        Mínimo 8 dígitos
                                    </small>
                                </div>
                                <div class="col">
                                    <!-- Input para confirmar contraseña -->
                                    <input type="password" id="confirmar_clave" name="confirmar_clave"  class="form-control validate" placeholder="Repita contraseña"  required/>
                                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                        Repita su contraseña
                                    </small>
                                </div>   
                            </div>  
                             <!-- Sign up button -->
                             <button class="btn btn-info my-4 btn-block"  onclick="console.log($('#nacimiento').val())"  type="submit">Crear cuenta</button>
                        </form>
                        <!-- Default form register -->
                    </div>
                </div>
            </div>
        </div>
            <!--/Contenedor -->
        </div>
        <!--/Máscara -->
    </div>  
<?php
    Template::footerTemplate('register.js');
?>
