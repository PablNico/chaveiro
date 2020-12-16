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
                <?php 
                    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                ?>
                <a href="detalhes-produto.php?id=<?php echo $id ?>" class="btn red">Voltar</a>
                <h5 class="light">Editar Cliente</h5><hr>
            </div>
            <div class="card-content">
                <?php 
                    require_once "../classes/autoload.php";

                    $editProduto = new Produtos();
                    $editProduto->dadosDaTabela($id);
                ?>
            </div>
        </div>

    </div>
</div>
<?php 
    endif;
    require_once "../config/footer.inc.php"; 
?>