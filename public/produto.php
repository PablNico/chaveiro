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
                <?php require_once "../forms/form-add-produto.php";?>
            </div>
        </div>
    </div>
</div>
<div class="row container">
    <div class="col s12">
        <div class="card">
            <div class="card-action">
                <h5 class="light">Produtos cadastrados</h5>
            </div>

            <div class="card-content">
                <table class="responsive-table striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require_once "../database/produtos/read.php"; ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div>
</div>
<?php endif;require_once "../config/footer.inc.php"; ?>