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
                    <h5 class="light">Consultar Serviços</h5>
                </div>

               
                <div class="card-content">
                    
                    <?php require_once "../forms/form-consulta-servico.php"; ?>
                    
                    <h5 class="light"> Resultado consulta</h5>
                    <table class="responsive-table striped">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Cliente</th>
                                <th>Endereço</th>
                                <th>Funcionario</th>
                                <th colspan="3">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once "../database/servicos/read.php"; ?>
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </div>
<?php endif;require_once "../config/footer.inc.php"; ?>