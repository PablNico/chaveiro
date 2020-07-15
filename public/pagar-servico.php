<?php require_once "../config/header.inc.php";?>
<div class="row container">
    <div class="col s12">
        <div class="card">
            <div class="card-action">
                <h5>Pagar serviço</h5>
            </div>
            <div class="card-content">
                
                <?php    
                    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
                    require_once "../forms/form-pagar-servico.php";
                ?>
            </div>
        </div>
    </div>
</div>

<?php require_once "../config/footer.inc.php";?>