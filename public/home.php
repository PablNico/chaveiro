<?php 
  if(!isset($_SESSION)) 
  { 
      session_start();
  } 
    require_once "../config/header.inc.php";
    if (!isset($_SESSION['autenticado'])):
        $destino = header("Location: login.php");
    else:
?>

<!-- Atalhos do sistema -->
<div class="row container center-align">
    <?php
        if (isset($_SESSION['mensagem'])) 
        {
            echo "<p class='center green darken-2 white-text' style='border-radius:20px; padding:10px'>"; 
                echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']);
            echo "</p>";
        }
    ?>
    <div class="col s12">
        <div class="card">
            <div class="card-action deep-orange darken-3 white-text">
                <h5 class="light">
                    Atalhos do sistema
                </h5>
            </div>
            <div class="card-content">
                <div class="carousel carousel-slider center">
                    <div class="carousel-fixed-item center">
                    </div>
                    <div class="carousel-item indigo white-text" href="usuario.php">
                    <h2>Adicionar usuário</h2>
                    <p class="white-text">
                        Os usuários serão os utilizadores do sistema, eles quem vão aceitar os serviços dos clientes <br>
                        Apenas o <b>Administrador</b> pode criar novos usuários.
                    </p>
                    </div>
                    <div class="carousel-item amber dark-text" href="#two!">
                    <h2>Criar serviço</h2>
                    <p class="dark-text">
                        Para adicionar um novo serviço, você pode selecionar um cliente da lista, ou informar um no momento do cadastro
        
                    </p>
                    </div>
                    <div class="carousel-item green white-text" href="#three!">
                    <h2>Third Panel</h2>
                    <p class="white-text">This is your third panel</p>
                    </div>
                    <div class="carousel-item blue white-text" href="#four!">
                    <h2>Fourth Panel</h2>
                    <p class="white-text">This is your fourth panel</p>
                    </div>
                </div>
                <!-- Ações do sistema -->
                <hr>
                    <a href="add-servico.php" class="btn">Novo serviço</a>
                    <a href="clientes.php" class="btn green">Novo cliente</a>
                    <a href="produto.php" class="btn indigo">Novo produto</a>

            </div>
        </div>
    </div>
    
</div>


<!-- Dashboard -->
<div class="row container">
        <div class="col s12 l6">
            <div class="card">
                <div class="card-action green darken-3 white-text">
                    Meus Serviços
                </div>
                <div class="card-content">
                    <?php require_once "../database/servicos/meusServicos.php"; ?>
                </div>
            </div>
        </div>
        
        <div class="col s12 l6">
            <div class="card">
                <div class="card-action yellow darken-4 white-text">
                    Serviços abertos
                </div>
                <div class="card-content">
                    <?php require_once "../database/servicos/servicosAbertos.php"; ?>
                </div>
            </div>
        </div>
        <div class="col s12 l6">
            <div class="card">
                <div class="card-action blue darken-3 white-text">
                    Serviços Finalizados
                </div>
                <div class="card-content">
                    <?php require_once "../database/servicos/servicosFinalizados.php"; ?>
                </div>
            </div>
        </div>
        <div class="col s12 l6">
            <div class="card">
                <div class="card-action red white-text">
                    Serviços Cancelados
                </div>
                <div class="card-content">
                    <?php require_once "../database/servicos/servicosCancelados.php"; ?>
                </div>
            </div>
        </div>
    
</div>


<?php 
    endif;
    require_once "../config/footer.inc.php";
?>