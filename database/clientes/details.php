<?php
    require_once "../classes/autoload.php";
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);

    $detalhes = new Clientes;
    $detalhes->detalhesCliente($id);
?>