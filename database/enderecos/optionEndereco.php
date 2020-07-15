<?php
    require_once "../../classes/autoload.php";
    $optionEndereco = new Endereco;
    $idCliente = filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_NUMBER_INT);
    $optionEndereco->optionEndereco($idCliente);
?>
