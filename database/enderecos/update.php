<?php

    require_once "../../classes/autoload.php";

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
    $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
    $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_SPECIAL_CHARS);
    $cliente = filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_SPECIAL_CHARS);

    $update = new Endereco;
    $update->update($id, $rua, $numero, $complemento, $cidade, $uf, $cliente);

?>