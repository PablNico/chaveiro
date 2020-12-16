<?php 
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    require_once "../classes/autoload.php";
    $detalhes = new Produtos;
    $detalhes->detalhesProtudo($id);
?>