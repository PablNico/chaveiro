<?php require_once "../config/header.inc.php"; ?>
<?php 
    if (!isset($_SESSION['autenticado'])):
        $destino = header("Location: login.php");
    else:
?>
<div class="row container">
    <div class="col s12">
        <div class="card">
            <div class="card-action">
                <h5 class="light">Cadastrar Produto</h5>
            </div>
            <div class="card-content">
                <?php $pasta = filter_input(INPUT_GET, "pasta", FILTER_SANITIZE_FULL_SPECIAL_CHARS)?>
                <?php require_once "../forms/form-add-produto.php";?>
            </div>
        </div>
    </div>
</div>

<?php endif;require_once "../config/footer.inc.php"; ?>