<?php
    require_once "../classes/autoload.php";

    $search =  filter_input(INPUT_POST, "search", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $subpasta = filter_input(INPUT_GET, "pasta", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $readPasta = new Produtos;
    $readPasta->readPasta($search, $subpasta);
?>