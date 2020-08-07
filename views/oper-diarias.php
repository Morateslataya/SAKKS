<!-- Mando a llamar la plantilla header -->
<?php
    require_once('../core/helpers/template.php');
    Template::headerTemplate('Gráficas');
?>
<main>
    <div class="container">
        <div class="row">
            <h4>Facturación</h4>
            <div class="col-mb-4 mb-4">
                <canvas id="chart-transaccion-total"></canvas>
            </div>
            <div class="col-mb-4 mb-4">
                <canvas id="chart-facturas-1"></canvas>
            </div>
            <div class="col-mb-4 mb-4">
                <canvas id="chart-facturas-2"></canvas>
            </div>
        </div>
    </div>
</main>
<?php
    Template::footerTemplate('register.js');
?>