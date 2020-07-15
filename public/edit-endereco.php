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
                <h5 class="light">Editar endereço</h5><hr>
            </div>
            <div class="card-content">
                <?php 
                    require_once "../classes/autoload.php"; 
                    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
                    
                    $editEndereco = new Endereco;
                    $editEndereco->dadosDaTabela($id);

                ?>
            </div>
        </div>
    </div>
</div>

<?php endif;require_once "../config/footer.inc.php"; ?>