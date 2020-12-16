<?php
    require_once "../classes/autoload.php";
    $optionEndereco = new Endereco;
    $idCliente = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $optionEndereco->read($idCliente);
?>