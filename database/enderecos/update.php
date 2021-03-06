<?php

    require_once "../../classes/autoload.php";

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
    $edificio = filter_input(INPUT_POST, "edificio", FILTER_SANITIZE_SPECIAL_CHARS);
    $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
    $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_SPECIAL_CHARS);
    $cliente = filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_SPECIAL_CHARS);

    $update = new Endereco;
    $update->update($id, $logradouro, $nome, $numero, $edificio, $complemento, $cidade, $uf, $cliente);

?>