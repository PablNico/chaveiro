<?php
    require_once "../config/header.inc.php"; 
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
                    <h5 class="">Cadastrar Cliente</h5>
                </div>

                <div class="card-content">
                <?php 
                    if(isset($_GET['CPF']))
                    {
                        $_SESSION['tipoCliente'] = "pessoaFisica";
                        require_once "../forms/form-add-cliente.php"; 
                    }
                    elseif(isset($_GET['CNPJ']))
                    {
                        $_SESSION['tipoCliente'] = "pessoaJuridica";
                        require_once "../forms/form-add-cliente.php"; 
                    }
                    elseif (!isset($_SESSION['tipoCliente']) or isset($_GET['recomecar']) ) 
                    {
                        echo "<h5 class='light'>Selecione o tipo de cliente</h5>";
                        require_once "../forms/form-seleciona-tipoCliente.php"; 
                    }
                    else
                    {
                        require_once "../forms/form-add-cliente.php"; 
                    }

                        
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row container">
        <div class="col s12">
            <div class="card">
                <div class="card-action">
                    <h5 class="">Clientes cadastrados</h5>
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
    </div> -->
<?php 
            endif;
            require_once "../config/footer.inc.php"; 
?>