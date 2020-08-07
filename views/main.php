<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Inicio');
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card" id="tarjeta-main">
                    <img class="card-img-top" src="../resources/img/Dibujo inicio@2x.png" alt="Card image cap">
                    <div class="card-body text-center">
                        <h4 class="card-title" id="titulo-main">Está algo vacío por aquí...</h4>
                        <p class="card-text" id="texto-main">Elige algo del menú para comenzar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Mando a llamar plantilla del footer -->
<?php
    Template::footerTemplate('index.js');
?>
