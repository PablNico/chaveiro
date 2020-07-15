<?php
    require_once "../../classes/autoload.php";

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);

    $finalizar = new Servico;

    $finalizar->finalizarServico($id);
?>