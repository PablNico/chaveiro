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
                <h5 class="">Selecionar usuário</h5>
            </div>
            <div class="card-content">

                <table class="striped responsive-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
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

<?php 
    endif;
    require_once "../config/footer.inc.php"; 
?>