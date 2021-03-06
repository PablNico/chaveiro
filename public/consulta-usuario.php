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
                <h5 class="">Consulta usuários</h5>
            </div>
            <div class="card-content">
                <?php require_once "../forms/form-consulta-usuario.php"?> 
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Senha</th>
                            <th>Administrador</th>
                            <th colspan="3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require_once "../database/usuario/read.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

    <?php endif;
    require_once "../config/footer.inc.php"; ?>