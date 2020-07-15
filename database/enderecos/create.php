<?php
    require_once "../../classes/autoload.php";

    $rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
    $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
    $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_SPECIAL_CHARS);
    $cliente = filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $create = new Endereco;
    $create->dadosDoFormulario($rua, $numero, $complemento, $cidade, $uf, $cliente);
    $create->create();
?>

