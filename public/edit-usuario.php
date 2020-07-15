<?php require_once "../config/header.inc.php"; ?>
<?php 
    if (!isset($_SESSION['autenticado'])):
        $destino = header("Location: login.php");
    else:
?>
<div class="row container">
    <div class="col s12">
        <h5 class="light">Editar Usuário</h5><hr>
        <?php 
            require_once "../classes/autoload.php";
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $editUsuario = new Usuario();
            $editUsuario->dadosDaTabela($id);
        ?>
    </div>
</div>

<?php endif;require_once "../config/footer.inc.php"; ?>