<?php require_once "../config/header.inc.php"; ?>
<?php require_once "../classes/autoload.php"; ?>
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
                    <h5 class="light">Consultar produtos</h5>
                </div>

                <div class="card-content">
                    <?php $pasta = filter_input(INPUT_GET, "pasta", FILTER_SANITIZE_URL)?>
                    <?php require_once "../forms/form-consulta-produto.php"; ?>
                    <a href="pasta.php?subpasta=<?=$pasta?>" class="btn-floating btn-medium waves-effect waves-light blue"><i class="material-icons">create_new_folder</i></a>
                    <a href="produtos.php?pasta=<?=$pasta?>" class="btn-floating btn-medium waves-effect waves-light blue"><i class="material-icons">add_shopping_cart</i></a>
                   
                    
                    <?php 
                        $produto = new Produtos;
                       
                       
                    ?>
                    <h5 class="light"> Resultado consulta em pasta: <?php echo $produto->mostrarPasta($pasta);?> </h5>

                    <div class="row">
                        <div class="col s12">
                        <br>
                        <?php  $produto->btnVoltar($pasta);?>
                            <ul class="tabs">
                                <li class="tab col s6"><a href="#pastas">Pastas</a></li>
                                <li class="tab col s6"><a href="#produto">Produtos</a></li>
                            </ul>
                        </div>
                        <div id="pastas" class="col s12"> <?php require_once "../database/produtos/readPasta.php"; ?></div>
                        <div id="produto" class="col s12"><?php require_once "../database/produtos/read.php"; ?></div>

                    </div>

                </div>
            </div>


        </div>
    </div>
<?php endif;require_once "../config/footer.inc.php"; ?>