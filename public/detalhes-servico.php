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

<div class="row container">
    <!-- Div aletar -->
        <?php 
            require_once "../config/alerta.inc.php";
        ?>
    <!-- Div form -->
    <div class="col s12">
        <div class="card">
            <div class="card-action">
                <a href="consulta-servicos.php" class="btn red">Voltar</a>
                <h5>Detalhes do serviço</h5>
            </div>
            <div class="card-content">
                <?php require_once "../database/servicos/detalhes.php";?>
            </div>
        </div>
    </div>
</div>


<?php 
    endif;
    require_once "../config/footer.inc.php";
?>