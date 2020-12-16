<?php
    require_once "../classes/autoload.php";
    $search = filter_input(INPUT_POST, "search", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pasta = filter_input(INPUT_GET, "pasta", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $read = new Produtos;
    $read->read($search, $pasta);
?>