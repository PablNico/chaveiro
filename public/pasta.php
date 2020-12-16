<?php require_once "../config/header.inc.php"; ?>
<?php 
    if (!isset($_SESSION['autenticado'])):
        $destino = header("Location: login.php");
    else:
?>

<div class="row container">
    <div class="col s12">
        <!-- Div aletar -->
            <?php 
                require_once "../config/alerta.inc.php";
            ?>
        <!-- Div form -->
        <div class="card">
            <div class="card-action">
                <h5 class="">Consultar pastas</h5>
            </div>
            <div class="card-content">
                <?php $subpasta = filter_input(INPUT_GET, "subpasta", FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?> 
                <?php require_once "../forms/form-add-pasta.php"?> 
            </div>
        </div>

    </div>
</div>

    <?php endif;
    require_once "../config/footer.inc.php"; ?>