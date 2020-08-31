
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
                <h5 class="light">Detalhes do cliente</h5>
            </div>
            <div class="card-content">
                <?php require_once "../database/clientes/details.php"; ?>
                <h5 class="light">Endereços do cliente</h5>
                <table class="striped responsive-table centered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require_once "../database/enderecos/dadosDaTabela.php"; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>


<?php 
endif;
require_once "../config/footer.inc.php"; ?>