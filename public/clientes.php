<?php
    require_once "../config/header.inc.php"; 
    if (!isset($_SESSION['autenticado'])):
        $destino = header("Location: login.php");
    else:
?>
    <div class="row container">
    <!-- Div aletar -->
        <div class="col s12">
            <?php 
                            if (isset($_SESSION['sucesso'])) 
                            {
                                echo "<p class='center green lighten-2 white-text' style='border-radius:20px; padding:10px'>"; 
                                    echo $_SESSION['sucesso'];
                                    unset($_SESSION['sucesso']);
                                echo "</p>";
                            }
                            elseif (isset($_SESSION['erro'])) 
                            {
                                echo "<p class='center red lighten-2 white-text' style='border-radius:20px; padding:10px'>"; 
                                    echo $_SESSION['erro'];
                                    unset($_SESSION['erro']);
                                echo "</p>";
                            }
            ?>
    <!-- Div form -->
            <div class="card">

                <div class="card-action">
                    <h5 class="">Cadastrar Cliente</h5>
                </div>

                <div class="card-content">
                <?php 
                        if (!isset($_SESSION['tipoCliente']) or isset($_GET['recomecar']) ) 
                        {
                            echo "<h5 class='light'>Selecione o tipo de cliente</h5>";
                            require_once "../forms/form-seleciona-cliente.php"; 
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