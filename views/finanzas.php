<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Gráficas');
?>
<main>
    <div class="container">
        <div class="row">
            <div class="card text-center">
                <h4 class="card-title">
                    <form action="" id="form-"><input type="text" class="form-control validate input-factura"><button class="btn btn-guardar"></button><input type="text" class="form-control validate input-factura"><button class="btn btn-guardar"></button></form>
                </h4>
            </div>
            <div class="card text-center">
                <h4 class="card-title">
                    <form action="" id="form-"><input type="text" class="form-control validate input-factura"><button class="btn btn-guardar"></button><input type="text" class="form-control validate input-factura"><button class="btn btn-guardar"></button></form>
                </h4>
            </div>
        </div>
    </div>
</main>
<?php
    Template::footerTemplate('register.js');
?>