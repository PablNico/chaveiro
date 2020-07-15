<?php 
    require_once "../../classes/autoload.php";
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_NUMBER_INT);

    $pagamento = new Servico;
    $pagamento->pagarServico($id, abs($valor));

?>