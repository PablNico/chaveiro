<?php
    require_once "../../classes/autoload.php";

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_SPECIAL_CHARS);
    $pasta = filter_input(INPUT_POST, "pasta", FILTER_SANITIZE_SPECIAL_CHARS);
    $estoque = filter_input(INPUT_POST, "estoque", FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_SPECIAL_CHARS);

    $updateProduto = new Produtos;
    $updateProduto->update($id, $nome, $categoria, $estoque, $valor)
 
?>