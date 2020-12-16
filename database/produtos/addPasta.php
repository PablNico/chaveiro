<?php
    require_once "../../classes/autoload.php";

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $subpasta = filter_input(INPUT_POST, "subpasta", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $addPasta = new Produtos;
    $addPasta->criaPasta($nome, $subpasta);
?>