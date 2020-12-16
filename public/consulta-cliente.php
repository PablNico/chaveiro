
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
                <h5 class="light">Consultar Cliente</h5><hr>
            </div>
            <div class="card-content">
                <?php require_once "../forms/form-consulta-cliente.php"; ?>
                <h4 class="light">Resultado consulta</h5><hr>
                <table class="striped responsive-table centered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Tipo Cliente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require_once "../database/clientes/read.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
    <?php endif;require_once "../config/footer.inc.php"; ?>